<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\ClassDay;
use App\Models\TuitionClass;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $date = $request->query('date');
        $tuitionClass = $request->query('tuitionClass');

        if ($tuitionClass) {
            if ($date) {
                $classDays = ClassDay::where('date', $date)
                    ->where('tuition_class_id', $tuitionClass)
                    ->get();
            } else {
                $classDays = ClassDay::where('tuition_class_id', $tuitionClass)
                    ->orderBy('date', 'desc')
                    ->get();
            }
        } else {
            $classDays = [];
        }
        // dd(empty($classDays));
        $tuitionClasses = TuitionClass::all();
        return view('attendances.index', compact('classDays', 'date', 'tuitionClass', 'tuitionClasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attendances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
