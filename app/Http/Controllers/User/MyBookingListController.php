<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\BookingList;
use App\Models\Room;
use App\Models\RoomStatus;

use App\Http\Requests\User\MyBookingListRequest;

use DataTables;

class MyBookingListController extends Controller
{
    public function json(){
        $data = BookingList::where('user_id', Auth::user()->id)->with([
            'room_status.room'
        ]);

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.my-booking-list.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = RoomStatus::where('status', 'ADA')->with([
            'room'
        ])->get();

        return view('pages.user.my-booking-list.create', [
            'rooms' => $rooms,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MyBookingListRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $room_name = Room::select('name')->where('id', $data['room_id'])->get();

        if(
            BookingList::where([
                ['date', '=', $data['date']],
                ['room_id', '=', $data['room_id']],
            ])
            ->whereBetween('start_time', [$data['start_time'], $data['end_time']])
            ->count() <= 0 || 
            BookingList::where([
                ['date', '=', $data['date']],
                ['room_id', '=', $data['room_id']],
            ])
            ->whereBetween('end_time', [$data['start_time'], $data['end_time']])
            ->count() <= 0 ||
            BookingList::where([
                ['date', '=', $data['date']],
                ['room_id', '=', $data['room_id']],
                ['start_time', '<=', $data['start_time']],
                ['end_time', '>=', $data['end_time']],
            ])->count() <= 0
        ) {
            if(BookingList::create($data)) {
                $request->session()->flash('alert-success', 'Booking ruang '.$room_name.' berhasil ditambahkan');
            } else {
                $request->session()->flash('alert-failed', 'Booking ruang '.$room_name.' gagal ditambahkan');
            }
        } else {
            $request->session()->flash('alert-success', 'Ruangan '.$room_name.' sudah dibooking');
            return redirect()->route('room.create');
        }

        return redirect()->route('room.index');
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
        $item = Room::findOrFail($id);

        return view('pages.admin.room.edit_or_create', [
            'item'  => $item 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        $data = $request->all();

        if(isset($data['photo'])){
            $data['photo']          = $request->file('photo')->store(
                'assets/image/room', 'public'
            );
        }

        $item = Room::findOrFail($id);

        if($item->update($data)) {
            $request->session()->flash('alert-success', 'Ruang '.$item->name.' berhasil diupdate');
        } else {
            $request->session()->flash('alert-failed', 'Ruang '.$item->name.' gagal diupdate');
        }
        
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Room::findOrFail($id);
        
        if($item->delete()) {
            session()->flash('alert-success', 'Ruang '.$item->name.' berhasil dihapus!');
        } else {
            session()->flash('alert-failed', 'Ruang '.$item->name.' gagal dihapus');
        }

        return redirect()->route('room.index');
    }
}
