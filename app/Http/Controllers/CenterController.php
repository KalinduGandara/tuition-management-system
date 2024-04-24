<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Http\Requests\StoreCenterRequest;
use App\Http\Requests\UpdateCenterRequest;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centers = Center::all();
        return view('centers.index', compact('centers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('centers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCenterRequest $request)
    {
        $data = $request->validated();
        Center::create($data);
        return redirect()->route('centers.index')->with('success', 'Center created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Center $center)
    {
        $tuitionClasses = $center->tuitionClasses;
        return view('centers.show', compact('center', 'tuitionClasses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Center $center)
    {
        return view('centers.edit', compact('center'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCenterRequest $request, Center $center)
    {
        // dd($request);
        $data = $request->validated();
        $center->update($data);
        return to_route('centers.index')->with('success', 'Center updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Center $center)
    {
        try {
            $center->delete();
            return redirect()->route('centers.index')->with('success', 'Center deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cannot delete th center ' . $center->name . ' because it has associated tuition classes.');
        }
    }
}
