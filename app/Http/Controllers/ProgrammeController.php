<?php

namespace App\Http\Controllers;

use view;
use App\Models\Unit;
use App\Models\User;
use App\Models\Observer;
use App\Models\Programme;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProgrammeRequest;
use App\Http\Requests\UpdateProgrammeRequest;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('noss.programme.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noss.programme.create', [
            'units' => Unit::all(),
            'users' => User::all(),
            'observers' => Observer::with('user')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgrammeRequest $request)
    {
        $validated = $request->validate([
            'unit_id' => ['required', 'uuid', 'exists:units,id'],
            'cordinator_id' => ['required', 'uuid', 'exists:users,id'],
            'date_start' => ['required', 'date'],
            'date_end' => ['required', 'date', 'after_or_equal:date_start'],
            'report' => ['nullable', 'boolean'],
            'report_file' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
            'observer_ids' => ['nullable', 'array'],
            'observer_ids.*' => ['uuid', 'exists:observers,id'],

        ]);

        $data = $validated;
        
        $data['report'] = $request->has('report');

        if ($request->hasFile('report_file')) {
            $data['report_file'] = $request->file('report_file')->store('programmes/reports', 'public');
        }

        $programme = Programme::create($data);
        $programme->observers()->sync($request->input('observer_ids', []));

        return redirect()->route('programme.index')->with('success', 'Programme created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programme $programme)
    {
        return view('noss.programme.edit', [
            'programme' => $programme,
            'units' => Unit::all(),
            'users' => User::all(),
            'observers' => Observer::with('user')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgrammeRequest $request, Programme $programme)
    {
        
        $validated = $request->validate([
            'unit_id' => ['required', 'uuid', 'exists:units,id'],
            'cordinator_id' => ['required', 'uuid', 'exists:users,id'],
            'date_start' => ['required', 'date'],
            'date_end' => ['required', 'date', 'after_or_equal:date_start'],
            'report' => ['nullable', 'boolean'],
            'report_file' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
            'observer_ids' => ['nullable', 'array'],
            'observer_ids.*' => ['uuid', 'exists:observers,id'],

        ]);

        $data = $validated;
        $data['report'] = $request->has('report');

        if ($request->hasFile('report_file')) {
            // Delete old file if exists
            if ($programme->report_file) {
                Storage::disk('public')->delete($programme->report_file);
            }

            $data['report_file'] = $request->file('report_file')->store('programmes/reports', 'public');
        }

        $programme->update($data);
        
        $programme->observers()->sync($request->input('observer_ids', []));

        return redirect()->route('programmes.index')->with('success', 'Programme updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programme $programme)
    {
        // Delete report file if it exists
        if ($programme->report_file) {
            Storage::disk('public')->delete($programme->report_file);
        }

        $programme->delete();

        return redirect()->route('programmes.index')->with('success', 'Programme deleted successfully.');

    }
}
