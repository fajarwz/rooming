<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

use App\Models\BookingList;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\User;

use App\Mail\BookingMail;

use App\Http\Requests\User\MyBookingListRequest;

use DataTables;

class MyBookingListController extends Controller
{
    public function json(){
        $data = BookingList::where('user_id', Auth::user()->id)->with([
            'room'
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
        $rooms = Room::orderBy('name')->get();

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
        $data               = $request->all();
        $data['user_id']    = Auth::user()->id;
        $data['status']     = 'PENDING';

        $user_name          = Auth::user()->name;
        $user_email         = Auth::user()->email;
        $room               = Room::select('name')->where('id', $data['room_id'])->get();

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
                $request->session()->flash('alert-success', 'Booking ruang '.$room[0]['name'].' berhasil ditambahkan');

                $admin      = User::select('name', 'email')->where('role', 'ADMIN')->get();
                $status     = 'CREATED';

                $to_role    = 'USER';

                Mail::to($user_email)
                    // ->send(new BookingMail($data['user_id'], $room[0]['name'], $data['date'], $data['start_time'], $data['end_time'], $data['purpose'], $admin[$i]['name'], URL::to('/my-booking-list')));
                    ->send(new BookingMail($user_name, $room[0]['name'], $data['date'], $data['start_time'], $data['end_time'], $data['purpose'], $to_role, $user_name, 'https://google.com', $status));

                $to_role    = 'ADMIN';

                for ($i=0; $i < count($admin); $i++) { 
                    Mail::to($admin[$i]['email'])
                    // ->send(new BookingMail($data['user_id'], $room[0]['name'], $data['date'], $data['start_time'], $data['end_time'], $data['purpose'], $admin[$i]['name'], URL::to('/admin/booking-list')));
                    ->send(new BookingMail($user_name, $room[0]['name'], $data['date'], $data['start_time'], $data['end_time'], $data['purpose'], $to_role, $admin[$i]['name'], 'https://google.com', $status));
                }

            } else {
                $request->session()->flash('alert-failed', 'Booking ruang '.$room[0]['name'].' gagal ditambahkan');
                return redirect()->route('my-booking-list.create');
            }
        } else {
            $request->session()->flash('alert-failed', 'Ruangan '.$room[0]['name'].' di waktu itu sudah dibooking');
            return redirect()->route('my-booking-list.create');
        }

        return redirect()->route('my-booking-list.index');
    }

    /**
     * Cancel the specified data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $item           = BookingList::findOrFail($id);
        $data['status'] = 'BATAL';

        if($item->update($data)) {
            session()->flash('alert-success', 'Booking Ruang '.$item->name.' berhasil dibatalkan');
        } else {
            session()->flash('alert-failed', 'Booking Ruang '.$item->name.' gagal dibatalkan');
        }
        
        return redirect()->route('my-booking-list.index');
    }

    public function adminEmail() 
    {
        $email  = User::select('email')->where('role', 'ADMIN')->get();

        return $email; 
    }
}
