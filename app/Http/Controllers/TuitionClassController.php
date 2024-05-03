<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassDayRequest;
use App\Models\TuitionClass;
use App\Http\Requests\StoreTuitionClassRequest;
use App\Http\Requests\UpdateTuitionClassRequest;
use App\Models\Attendance;
use App\Models\ClassDay;

class TuitionClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tuitionClasses = TuitionClass::all();

        return view('tuitionClasses.index', compact('tuitionClasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tuitionClasses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTuitionClassRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TuitionClass $tuitionClass)
    {
        $registrations = $tuitionClass->registrations;
        $students = $registrations->map(function ($registration) {
            $student = $registration->student;
            $student->payments = $registration->payments->where('month', date('m'));
            $student->attendances = $registration->attendances->where('date', '>=', date('Y-m-01'))->where('date', '<=', date('Y-m-t'));
            // $student->attendances = $registration->attendances->sortByDesc('date')->take(5);
            return $student;
        });
        // dd($students);
        return view('tuitionClasses.show', compact('tuitionClass', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TuitionClass $tuitionClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTuitionClassRequest $request, TuitionClass $tuitionClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TuitionClass $tuitionClass)
    {
        //
    }

    public function showClassDays(TuitionClass $tuitionClass)
    {
        $classDays = ClassDay::where('tuition_class_id', $tuitionClass->id)
            ->orderBy('date', 'desc')
            ->get();
        // dd($classDays);
        return view('tuitionClasses.attendance.show', compact('tuitionClass', 'classDays'));
    }

    public function createClassDay(TuitionClass $tuitionClass)
    {
        $students = $tuitionClass->registrations->map(function ($registration) {
            return $registration->student;
        });
        return view('tuitionClasses.attendance.create', compact('tuitionClass', 'students'));
    }

    public function storeClassDay(StoreClassDayRequest $request, TuitionClass $tuitionClass)
    {
        $registrations = $tuitionClass->registrations;

        // dd($request->attendances[$registrations[0]->id]);
        // dd($tuitionClass->id);
        $classDay = ClassDay::create([
            'tuition_class_id' => $tuitionClass->id,
            'date' => $request->date,
        ]);

        foreach ($registrations as $registration) {
            Attendance::create([
                'registration_id' => $registration->id,
                'class_day_id' => $classDay->id,
                'status' => $request->attendances[$registration->id],
            ]);
        }

        return redirect()->route('tuitionClasses.attendance', $tuitionClass);
    }
}
