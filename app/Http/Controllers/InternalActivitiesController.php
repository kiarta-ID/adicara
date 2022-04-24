<?php

namespace App\Http\Controllers;

use App\Models\InternalActivities;
use App\Http\Requests\StoreInternalActivitiesRequest;
use App\Http\Requests\UpdateInternalActivitiesRequest;

class InternalActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInternalActivitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInternalActivitiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternalActivities  $internalActivities
     * @return \Illuminate\Http\Response
     */
    public function show(InternalActivities $internalActivities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternalActivities  $internalActivities
     * @return \Illuminate\Http\Response
     */
    public function edit(InternalActivities $internalActivities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInternalActivitiesRequest  $request
     * @param  \App\Models\InternalActivities  $internalActivities
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInternalActivitiesRequest $request, InternalActivities $internalActivities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternalActivities  $internalActivities
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternalActivities $internalActivities)
    {
        //
    }
}
