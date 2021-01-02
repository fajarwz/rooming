<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        $data = BookingList::where([
            ['status', '=', 'DISETUJUI'],
            ['date', '=', Carbon::today()->toDateString()],
            ['start_time', '=', Carbon::now()->toTimeString()],
        ]);

        if($data->room_status()->update($data['status'] = 'DIBOOKING')) {
            $this->info('Booking-an '.$data->room_status()->room()->name.' dimulai');
        } else {
            $this->info('Terjadi kesalahan dalam memulai booking '.$data->room_status()->room()->name);
        }
    }
}
