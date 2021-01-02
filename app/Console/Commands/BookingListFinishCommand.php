<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        $data = BookingList::where([
            ['status', '=', 'DISETUJUI'],
            ['date', '=', Carbon::today()->toDateString()],
            ['end_time', '=', Carbon::now()->toTimeString()],
        ]);

        if($data->update($data['status'] = 'SELESAI')){
            if($data->room_status()->update($data['status'] = 'ADA')){
                $this->info('Booking-an '.$data->room_status()->room()->name.' selesai');
            } else {
                $this->info('Terjadi kesalahan dalam mengubah status ruangan booking-an '.$data->room_status()->room()->name);
            }
        } else {
            $this->info('Terjadi kesalahan dalam menyelesaikan booking-an '.$data->room_status()->room()->name);
        }
    }
}
