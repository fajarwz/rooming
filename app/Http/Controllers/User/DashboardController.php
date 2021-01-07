<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use DataTables;

use App\Models\BookingList;

class DashboardController extends Controller
{
    public function dashboard_booking_list(){
        $today = Carbon::today()->toDateString();

        $data = BookingList::where('user_id', Auth::user()->id)
        ->whereDate('created_at', '=', $today)
        ->with([
            'room'
        ])->take(3);

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function index()
    {
        $today = Carbon::today()->toDateString();

        $booking_today      = BookingList::where('user_id', Auth::user()->id)
        ->whereDate('created_at', '=', $today)
        ->count();
        $booking_lifetime   = BookingList::where([
            ['user_id', Auth::user()->id],
        ])->count();

        return view('pages.user.dashboard', [
            'booking_today'     => $booking_today,
            'booking_lifetime'  => $booking_lifetime,
        ]);
    }
}
