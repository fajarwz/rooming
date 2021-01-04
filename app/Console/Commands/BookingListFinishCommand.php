<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\BookingList;

use Carbon\Carbon;

class BookingListFinishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:finish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set booking to finish based on time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data_booking_list = BookingList::where([
            ['status', '=', 'DIGUNAKAN'],
            ['date', '=', Carbon::today()->toDateString()],
            ['end_time', '<', Carbon::now()->toTimeString()],
        ])->with(['room_status.room']);

        $booking_list_status['status'] = 'SELESAI';

        if($data_booking_list->update($booking_list_status))
            $this->info('Finish booking-an selesai');

    }
}
