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
        Room::create([
            'id'            => 1,
            'name'          => 'Meeting 1',
            'description'   => 'Ruang meeting Dyeing atas',
            'capacity'      => 20,
        ]);

        Room::create([
            'id'            => 2,
            'name'          => 'Meeting 2',
            'description'   => 'Ruang meeting Dyeing sebelah Meeting 1',
            'capacity'      => 15,
        ]);

        Room::create([
            'id'            => 3,
            'name'          => 'Meeting 3',
            'description'   => 'Ruang meeting di Office bawah',
            'capacity'      => 15,
        ]);

        Room::create([
            'id'            => 4,
            'name'          => 'Meeting 4',
            'description'   => 'Ruang meeting di Weaving',
            'capacity'      => 15,
        ]);
    }
}
