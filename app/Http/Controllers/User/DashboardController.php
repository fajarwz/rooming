<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function index()
    {
        return view('pages.user.home', [
            'bookingList' => $this->booking::with('room', 'user')->Upcoming()->paginate(),
        ]);
    }
}
