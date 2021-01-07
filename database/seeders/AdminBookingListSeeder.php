<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookingList;

use Faker\Factory as Faker;

class AdminBookingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1 ; $i <= 1000 ; $i++){
            BookingList::create([
                'room_id'       => 2,
                'user_id'       => 2,
                'date'          => $faker->date($format = 'Y-m-d', $max = 'now'),
                'start_time'    => $faker->time($format = 'H:i', $max = 'now'),
                'end_time'      => $faker->time($format = 'H:i', $max = 'now'),
                'purpose'       => $faker->sentence(),
                'status'        => $faker->randomElement($array = array ('PENDING','DISETUJUI','DITOLAK','BATAL')),
            ]);
        }
    }
}
