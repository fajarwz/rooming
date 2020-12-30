<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create(
            [
                'id'            => 1,
                'name'          => 'Meeting 1',
                'description'   => 'Ruang meeting 1 atas',
                'capacity'      => 20,
            ],
            [
                'id'            => 2,
                'name'          => 'Meeting 2',
                'description'   => 'Ruang meeting 2 atas',
                'capacity'      => 15,
            ],
        );
    }
}
