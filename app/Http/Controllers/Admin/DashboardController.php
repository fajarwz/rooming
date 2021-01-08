<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BookingList;
use App\Models\Room;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $booking_list_all       = BookingList::all()->count();
        $booking_list_pending   = BookingList::where('status', 'PENDING')->count();
        $booking_list_disetujui = BookingList::where('status', 'DISETUJUI')->count();
        $booking_list_digunakan = BookingList::where('status', 'DIGUNAKAN')->count();
        $booking_list_selesai   = BookingList::where('status', 'SELESAI')->count();
        $booking_list_ditolak   = BookingList::where('status', 'DITOLAK')->count();
        $booking_list_batal     = BookingList::where('status', 'BATAL')->count();
        $booking_list_expired   = BookingList::where('status', 'EXPIRED')->count();

        $room                   = Room::all()->count();
        $user                   = User::where('ROLE', 'USER')->count();

        return view('pages.admin.dashboard', [
            'booking_list_all'          => $booking_list_all,
            'booking_list_pending'      => $booking_list_pending,
            'booking_list_disetujui'    => $booking_list_disetujui,
            'booking_list_digunakan'    => $booking_list_digunakan,
            'booking_list_selesai'      => $booking_list_selesai,
            'booking_list_ditolak'      => $booking_list_ditolak,
            'booking_list_batal'        => $booking_list_batal,
            'booking_list_expired'      => $booking_list_expired,
            'room'                      => $room,
            'user'                      => $user,
        ]);
    }
}
