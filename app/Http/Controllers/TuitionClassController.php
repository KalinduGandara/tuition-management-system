<?php

namespace App\Http\Controllers;

use App\Models\TuitionClass;
use App\Http\Requests\StoreTuitionClassRequest;
use App\Http\Requests\UpdateTuitionClassRequest;

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
            return $registration->student;
        });
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
}
