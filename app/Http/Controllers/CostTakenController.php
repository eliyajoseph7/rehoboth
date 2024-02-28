<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCostTakenRequest;
use App\Http\Requests\UpdateCostTakenRequest;
use App\Models\CostTaken;

class CostTakenController extends Controller
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
    public function store(StoreCostTakenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CostTaken $costTaken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CostTaken $costTaken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCostTakenRequest $request, CostTaken $costTaken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CostTaken $costTaken)
    {
        //
    }
}
