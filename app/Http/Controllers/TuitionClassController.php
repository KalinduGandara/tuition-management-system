<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassDayRequest;
use App\Http\Requests\StoreTestRequest;
use App\Models\TuitionClass;
use App\Http\Requests\StoreTuitionClassRequest;
use App\Http\Requests\UpdateTuitionClassRequest;
use App\Models\Attendance;
use App\Models\ClassDay;
use App\Models\Test;
use App\Models\TestMark;
use Illuminate\Support\Facades\DB;

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
        $classDays = $tuitionClass->classdays->filter(function ($classday) {
            return \Carbon\Carbon::parse($classday->date)->gte(\Carbon\Carbon::now()->startOfMonth()) &&
                \Carbon\Carbon::parse($classday->date)->lte(\Carbon\Carbon::now()->endOfMonth());
        });

        $students = $registrations->map(function ($registration) {
            $student = $registration->student;
            $student->payments = $registration->payments->where('month', date('m'));
            $student->attendances = $registration->attendances->filter(function ($attendance) {
                return \Carbon\Carbon::parse($attendance->classDay->date)->gte(\Carbon\Carbon::now()->startOfMonth()) &&
                    \Carbon\Carbon::parse($attendance->classDay->date)->lte(\Carbon\Carbon::now()->endOfMonth());
            });
            return $student;
        });

        return view('tuitionClasses.show', compact('tuitionClass', 'students', 'classDays'));
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
        $center_id = $tuitionClass->center_id;
        TuitionClass::destroy($tuitionClass->id);

        return redirect()->route('centers.show', $center_id)->with('success', 'Tuition class deleted successfully');
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

    public function showPayments(TuitionClass $tuitionClass)
    {
        $registrations = $tuitionClass->registrations;

        return view('tuitionClasses.payment.show', compact('tuitionClass', 'registrations'));
    }

    public function showTests(TuitionClass $tuitionClass)
    {
        $tests = $tuitionClass->tests;
        return view('tuitionClasses.test.show', compact('tuitionClass', 'tests'));
    }

    public function createTest(TuitionClass $tuitionClass)
    {
        $registrations = $tuitionClass->registrations;
        return view('tuitionClasses.test.create', compact('tuitionClass', 'registrations'));
    }

    public function storeTest(StoreTestRequest $request, TuitionClass $tuitionClass)
    {
        DB::transaction(function () use ($request, $tuitionClass) {
            $test = Test::create([
                'tuition_class_id' => $tuitionClass->id,
                'date' => $request->date,
                'type' => $request->type,
            ]);

            foreach ($request->marks as $registrationId => $mark) {
                TestMark::create([
                    'test_id' => $test->id,
                    'registration_id' => $registrationId,
                    'mark' => $mark,
                ]);
            }
        });
        return redirect()->route('tuitionClasses.test', $tuitionClass)->with('success', 'Test created successfully');
    }
}
