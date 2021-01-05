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
    public function booking_list_dashboard(){
        $today = Carbon::now()->toDateString();

        $data = BookingList::where([
            ['user_id', Auth::user()->id],
            ['date', $today],
        ])->with([
            'room'
        ])->paginate(3);

        return $data->toJson();
    }

    public function index()
    {
        $booking_today      = BookingList::where([
            ['id', Auth::user()->id],
            ['date', Carbon::now()->format('H:i:s')],
        ])->count();
        $booking_lifetime   = BookingList::where([
            ['id', Auth::user()->id],
        ])->count();

        return view('pages.user.dashboard', [
            'booking_today'     => $booking_today,
            'booking_lifetime'  => $booking_lifetime,
        ]);
    }
}
