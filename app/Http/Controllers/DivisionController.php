<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use Illuminate\Support\Str;
use App\Http\Requests\StoreDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.divisions.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.divisions.create', [
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDivisionRequest $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'abbr' => ['nullable', 'string', 'max:50'],
            'director_id' => ['nullable', 'uuid'],
        ]);
    
        Division::create([
            'id' => Str::uuid(),
            'name' => $validated['name'],
            'abbr' => $validated['abbr'] ?? null,
            'director_id' => $validated['director_id'] ?? null,
        ]);
    
        return redirect()->route('divisions.index')->with('success', 'Division created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        return view('admin.divisions.edit', [
            'division' => $division,
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDivisionRequest $request, Division $division)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'abbr' => ['nullable', 'string', 'max:50'],
            'director_id' => ['nullable', 'uuid'],
        ]);

        $division->update($validated);

        return redirect()->route('divisions.index')->with('success', 'Division updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        $division->delete();

        return redirect()->route('divisions.index')->with('success', 'Division deleted successfully.');
    }

}
