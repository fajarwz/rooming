<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            [ 'name' => 'PENDING' ],
            [ 'name' => 'APPROVED' ],
            [ 'name' => 'REJECTED' ],
            [ 'name' => 'CANCELLED' ],
        ]);
    }
}
