<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookingList;

use Faker\Factory as Faker;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();

        // for($i = 1 ; $i <= 4 ; $i++){
        //     Bookings::create([
        //         'room_id'       => $faker->numberBetween($min = 1, $max = 4),
        //         'status_id'        => $faker->randomElement($array = array ('PENDING','APPROVED','DECLINED','CANCELED')),
        //         'date'          => $faker->date($format = 'Y-m-d', $max = 'now'),
        //         'start_date_time'    => $faker->time($format = 'H:i', $max = 'now'),
        //         'end_date_time'      => $faker->time($format = 'H:i', $max = 'now'),
        //         'created_by'       => $faker->numberBetween($min = 2, $max = 4),
        //         'purpose'       => $faker->text($maxNbChars = 100),
        //     ]);
        // }
    }
}
