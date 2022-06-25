<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Http\Resources\PositionCollection;
use App\Http\Resources\PositionResource;
use App\Models\Event;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        return new PositionCollection($event->positions);
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
     * @param  \App\Http\Requests\StorePositionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event, StorePositionRequest $request)
    {
        $position = new Position();
        $position->fill($request->only(['nama_jabatan','jumlah_maksimum']));
        $position->event_id = $event->id;
        $position->save();
        return ["message" => "Jabatan berhasil ditambah!"];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, Position $position)
    {
        return new PositionResource($position);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePositionRequest  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePositionRequest $request, Event $event, Position $position)
    {
        $position->fill($request->only(['nama_jabatan','jumlah_maksimum']));
        $position->save();
        return ["message" => "Jabatan berhasil diubah!"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Position $position)
    {
        if(auth()->user()->id == $position->event->user_id) {
            $position->delete();
            return ["message" => "Jabatan berhasil dihapus!"];
        }
        return abort(403, "This action is unauthorized!");
    }
}
