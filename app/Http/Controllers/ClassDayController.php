<?php

namespace App\Http\Controllers;

use App\Models\ClassDay;
use App\Http\Requests\StoreClassDayRequest;
use App\Http\Requests\UpdateClassDayRequest;
use App\Models\Attendance;

class ClassDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassDayRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassDay $classDay)
    {
        $attendances = Attendance::where('class_day_id', $classDay->id)->get();
        return view('classDays.show', compact('attendances', 'classDay'));

        // return redirect()->route('classDays.edit', $classDay);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassDay $classDay)
    {
        return view('classDays.edit', compact('classDay'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassDayRequest $request, ClassDay $classDay)
    {
        foreach ($classDay->attendances as $attendance) {
            $attendance->update(['status' => $request->attendances[$attendance->registration->student->id]]);
        }


        return redirect()->route('classDays.show', $classDay)->with('success', 'Class day updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassDay $classDay)
    {
        $tuitionClass = $classDay->tuitionClass;
        // if ($classDay->attendances()->where('status', 'Present')->exists()) {
        //     return redirect()->back()->with('error', 'Cannot delete class day because some students are marked as present.');
        // }

        $classDay->delete();

        return redirect()->route('tuitionClasses.attendance', $tuitionClass)->with('success', 'Class day deleted successfully.');
    }
}
