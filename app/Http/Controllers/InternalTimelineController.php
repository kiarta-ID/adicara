<?php

namespace App\Http\Controllers;

use App\Models\InternalTimeline;
use App\Http\Requests\StoreInternalTimelineRequest;
use App\Http\Requests\UpdateInternalTimelineRequest;

class InternalTimelineController extends Controller
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
     * @param  \App\Http\Requests\StoreInternalTimelineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInternalTimelineRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternalTimeline  $internalTimeline
     * @return \Illuminate\Http\Response
     */
    public function show(InternalTimeline $internalTimeline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternalTimeline  $internalTimeline
     * @return \Illuminate\Http\Response
     */
    public function edit(InternalTimeline $internalTimeline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInternalTimelineRequest  $request
     * @param  \App\Models\InternalTimeline  $internalTimeline
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInternalTimelineRequest $request, InternalTimeline $internalTimeline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternalTimeline  $internalTimeline
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternalTimeline $internalTimeline)
    {
        //
    }
}
