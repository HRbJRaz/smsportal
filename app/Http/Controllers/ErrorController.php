<?php

namespace App\Http\Controllers;

use App\Models\Error;
use App\Http\Requests\StoreErrorRequest;
use App\Http\Requests\UpdateErrorRequest;

class ErrorController extends Controller
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
    public function store(StoreErrorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Error $error)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Error $error)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateErrorRequest $request, Error $error)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Error $error)
    {
        //
    }
}
