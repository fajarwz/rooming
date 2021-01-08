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
                'room_id'       => $faker->numberBetween($min = 1, $max = 4),
                'user_id'       => $faker->numberBetween($min = 2, $max = 4),
                'date'          => $faker->date($format = 'Y-m-d', $max = 'now'),
                'start_time'    => $faker->time($format = 'H:i', $max = 'now'),
                'end_time'      => $faker->time($format = 'H:i', $max = 'now'),
                'purpose'       => $faker->text($maxNbChars = 100),
                'status'        => $faker->randomElement($array = array ('PENDING','DISETUJUI','DITOLAK','BATAL')),
            ]);
        }
    }
}
