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
            if($item->update($data)) {
                session()->flash('alert-success', 'Booking Ruang '.$item->room->name.' sekarang '.$data['status']);
            } else {
                session()->flash('alert-failed', 'Booking Ruang '.$item->room->name.' gagal diupdate');
            }
        }
        
        return redirect()->route('booking-list.index');
    }
}
