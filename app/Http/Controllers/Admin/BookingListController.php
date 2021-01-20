<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BookingList;

use DataTables;
use Carbon\Carbon;

class BookingListController extends Controller
{
    public function json(){
        $data = BookingList::with([
            'room', 'user'
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
        return view('pages.admin.booking-list.index');
    }

    public function update($id, $value)
    {
        $item   = BookingList::findOrFail($id);
        $today  = Carbon::today()->toDateString();
        $now    = Carbon::now()->toTimeString();

        if($value == 1) {
            $data['status'] = 'DISETUJUI';
        }
        else if($value == 0) {
            $data['status'] = 'DITOLAK';
        }
        else {
            session()->flash('alert-failed', 'Perintah tidak dimengerti');
            return redirect()->route('booking-list.index');
        }

        if($item['date'] > $today || ($item['date'] == $today && $item['start_time'] > $now)) {
            if($data['status'] == 'DISETUJUI') {
                if(
                    BookingList::where([
                        ['date', '=', $item['date']],
                        ['room_id', '=', $item['room_id']],
                        ['status', '=', 'DISETUJUI'],
                    ])
                    ->whereBetween('start_time', [$item['start_time'], $item['end_time']])
                    ->count() <= 0 && 
                    BookingList::where([
                        ['date', '=', $item['date']],
                        ['room_id', '=', $item['room_id']],
                        ['status', '=', 'DISETUJUI'],
                    ])
                    ->whereBetween('end_time', [$item['start_time'], $item['end_time']])
                    ->count() <= 0 &&
                    BookingList::where([
                        ['date', '=', $item['date']],
                        ['room_id', '=', $item['room_id']],
                        ['start_time', '<=', $item['start_time']],
                        ['end_time', '>=', $item['end_time']],
                        ['status', '=', 'DISETUJUI'],
                    ])->count() <= 0
                ) {
                    if($item->update($data)) {
                        session()->flash('alert-success', 'Booking Ruang '.$item->room->name.' sekarang '.$data['status']);
                    } else {
                        session()->flash('alert-failed', 'Booking Ruang '.$item->room->name.' gagal diupdate');
                    }
                } else {
                    session()->flash('alert-failed', 'Ruangan '.$item->room->name.' di waktu itu sudah dibooking');
                }   
            } elseif($data['status'] == 'DITOLAK') {
                if($item->update($data)) {
                    session()->flash('alert-success', 'Booking Ruang '.$item->room->name.' sekarang '.$data['status']);
                } else {
                    session()->flash('alert-failed', 'Booking Ruang '.$item->room->name.' gagal diupdate');
                }
            }
        }
        
        return redirect()->route('booking-list.index');
    }
}
