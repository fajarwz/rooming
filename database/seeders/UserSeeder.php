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
            'email'      => 'admin@admin.com',
        ]);

        User::create([
            'id'            => 2,
            'name'          => 'User',
            'username'      => 'user',
            'password'      => bcrypt('user'),
            'description'   => 'Accounting Staff',
            'role'          => 'USER',
            'email'      => 'user@user.com',
        ]);

        User::create([
            'id'            => 3,
            'name'          => 'Fajarwz',
            'username'      => 'fajar',
            'password'      => bcrypt('fajar'),
            'description'   => 'IT Staff',
            'role'          => 'USER',
            'email'      => 'fajar@gmail.com',
        ]);

        User::create([
            'id'        => 4,
            'name'      => 'Foo',
            'username'  => 'foo',
            'password'  => bcrypt('foo'),
            'role'      => 'USER',
            'email'      => 'foo@gmail.com',
        ]);

        User::create([
            'id'        => 5,
            'name'      => 'Bar',
            'username'  => 'bar',
            'password'  => bcrypt('bar'),
            'role'      => 'USER',
            'email'      => 'bar@gmail.com',
        ]);
    }
}
