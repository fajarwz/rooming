<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Room;

class RoomController extends Controller
{
    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.room.index', [
            'rooms' => $this->room::all(),
        ]);
    }
}
