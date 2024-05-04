<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use DateTime;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        // dd($students);
        return view('students.index', compact('students'));
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
    public function store(StoreStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $registrations = $student->registrations;
        $tuitionClasses = $registrations->map(function ($registration) {
            return $registration->tuitionClass;
        })->sortByDesc(function ($tuitionClass) {
            return $tuitionClass->year;
        });

        $testmarks = $registrations->flatMap(function ($registration) {
            return $registration->testmarks->map(function ($testmark) {
                return [
                    'test' => $testmark->test,
                    'mark' => $testmark,
                ];
            });
        })->sortByDesc(function ($item) {
            return $item['test']->date;
        });

        $payments = $registrations->flatMap(function ($registration) {
            return $registration->payments->map(function ($payment) {
                $dateObj   = DateTime::createFromFormat('!m', $payment->month);
                $payment->month = $dateObj->format('F'); // Convert month number to month name
                return $payment;
            });
        })->sortByDesc(function ($payment) {
            return $payment->id;
        });
        return view('students.show', compact('student', 'tuitionClasses', 'testmarks', 'payments'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
