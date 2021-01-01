<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BookingList;

use DataTables;

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
        $item = BookingList::findOrFail($id);

        $status = ($value == 1) ? 'DISETUJUI' : 'DITOLAK';

        $data['status'] = $status;

        if($item->update($data)) {
            session()->flash('alert-success', 'Booking Ruang '.$item->name.' berhasil diupdate');
        } else {
            session()->flash('alert-failed', 'Booking Ruang '.$item->name.' gagal diupdate');
        }
        
        return redirect()->route('booking-list.index');
    }
}
