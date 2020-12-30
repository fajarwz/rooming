<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomStatus;

class RoomStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomStatus::create([
            'id'            => 1,
            'room_id'       => 1,
            'status'        => 'FREE',
        ]);

        RoomStatus::create([
            'id'            => 2,
            'room_id'       => 2,
            'status'        => 'BOOKED',
        ]);
    }
}
