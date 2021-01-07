<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'        => 1,
            'name'      => 'Admin',
            'username'  => 'admin',
            'password'  => bcrypt('admin'),
            'role'      => 'ADMIN',
        ]);

        User::create([
            'id'        => 2,
            'name'      => 'User',
            'username'  => 'user',
            'password'  => bcrypt('user'),
            'role'      => 'USER',
        ]);

        User::create([
            'id'        => 3,
            'name'      => 'Fajarwz',
            'username'  => 'fajar',
            'password'  => bcrypt('fajar'),
            'role'      => 'USER',
        ]);
    }
}
