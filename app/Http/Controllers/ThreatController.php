<?php

namespace App\Http\Controllers;

use App\Models\Threat;
use App\Http\Requests\StoreThreatRequest;
use App\Http\Requests\UpdateThreatRequest;

class ThreatController extends Controller
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
    public function store(StoreThreatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Threat $threat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Threat $threat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThreatRequest $request, Threat $threat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Threat $threat)
    {
        //
    }
}
