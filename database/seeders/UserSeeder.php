<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'password' => bcrypt('admin'),
                'description' => '',
                'role_id' => 1,
                'email' => 'admin@admin.com',
            ],
            [
                'id' => 2,
                'name' => 'User',
                'password' => bcrypt('user'),
                'description' => 'Accounting Staff',
                'role_id' => 2,
                'email' => 'user@user.com',
            ],
            [
                'id' => 3,
                'name' => 'Fajarwz',
                'password' => bcrypt('fajar'),
                'description' => 'IT Staff',
                'role_id' => 2,
                'email' => 'fajar@gmail.com',
            ],
            [
                'id' => 4,
                'name' => 'Foo',
                'password' => bcrypt('foo'),
                'description' => '',
                'role_id' => 2,
                'email' => 'foo@gmail.com',
            ],
            [
                'id' => 5,
                'name' => 'Bar',
                'password' => bcrypt('bar'),
                'description' => '',
                'role_id' => 2,
                'email' => 'bar@gmail.com',
            ]
        ]);
    }
}
