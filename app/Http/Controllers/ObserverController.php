<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Observer;
use App\Models\Programme;
use App\Http\Requests\StoreObserverRequest;
use App\Http\Requests\UpdateObserverRequest;

class ObserverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('noss.observer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noss.observer.create', [
            'users' => User::all(),
            'programmes' => Programme::with('unit')->orderBy('date_start', 'desc')->get()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreObserverRequest $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'uuid', 'exists:users,id'],
            'callsign' => ['required', 'string', 'max:255'],
            'initial_course_date' => ['nullable', 'date'],
            'refresher_course_date' => ['nullable', 'date'],
            'assigement_date' => ['nullable', 'date'],
        ]);

        $observer = Observer::create($validated);
        $observer->programmes()->sync($request->input('programme_ids', []));


        return redirect()->route('observers.index')->with('success', 'Observer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Observer $observer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Observer $observer)
    {
        return view('noss.observer.edit', [
            'observer' => $observer,
            'users' => User::all(),
            'programmes' => Programme::with('unit')->orderBy('date_start', 'desc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateObserverRequest $request, Observer $observer)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'uuid', 'exists:users,id'],
            'callsign' => ['required', 'string', 'max:255'],
            'initial_course_date' => ['nullable', 'date'],
            'refresher_course_date' => ['nullable', 'date'],
            'assigement_date' => ['nullable', 'date'],
        ]);
    
        $observer->update($validated);
        $observer->programmes()->sync($request->input('programme_ids', []));
    
        return redirect()->route('observers.index')->with('success', 'Observer updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Observer $observer)
    {
        $observer->delete();
    
        return redirect()->route('observers.index')->with('success', 'Observer deleted successfully.');
    }
}
