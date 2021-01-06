<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\BookingList;

use Carbon\Carbon;

class BookingListStartCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set booking to start based on time';

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
            ['status', '=', 'DISETUJUI'],
            ['date', '=', Carbon::today()->toDateString()],
            ['start_time', '<', Carbon::now()->toTimeString()],
            ['end_time', '>', Carbon::now()->toTimeString()],
        ]);

        $booking_list_status['status'] = 'DIGUNAKAN';

        if($data_booking_list->update($booking_list_status))
            $this->info('Start booking-an selesai');
    }
}
