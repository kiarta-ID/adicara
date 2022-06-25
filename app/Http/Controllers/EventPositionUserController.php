<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\Event;
use App\Models\Position;
use App\Models\PositionUser;
use App\Models\User;
use Illuminate\Http\Request;

class EventPositionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event, Position $position)
    {
        return new UserCollection($position->users);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event, Position $position, Request $request)
    {

        // $position_user = new PositionUser();
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return [
                "message" => "User tidak ditemukan!"
            ];
        }
        $position_user = PositionUser::where('user_id', $user->id)
            ->where('position_id', $position->id)->first();

        if ($position_user) {
            return [
                "message" => "User sudah berada dalam tim!"
            ];
        }
        $position_user->user_id = $user->id;
        $position_user->position_id = $position->id;
        $position_user->save();

        return ["message" => "User berhasil ditambahkan!"];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Position $position, User $user)
    {
        if(auth()->user()->id != $position->event->user_id)
        {
            return abort(403, "This action is unauthorized!");
        }
        $position_user = PositionUser::where('position_id', $position->id)->where('user_id', $user->id);
        if ($position_user) {
            $position_user->delete();
            return ["message" => "User berhasil dihapus dari tim!"];
        }
        else {
            return ["message" => "User tidak ada dalam tim!"];
        }
    }
}
