<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('admin'),
            'role'      => 'admin'
        ]);
        User::create([
            'name'      => 'Anugrah Sandi',
            'email'     => 'nuge@gmail.com',
            'password'  => bcrypt('secret'),
            'role'      => 'admin'
        ]);

        User::create([
            'name'      => 'Riski Amelia',
            'email'     => 'riski@gmail.com',
            'password'  => bcrypt('secret'),
            'role'      => 'operator'
        ]);

        User::create([
            'name'      => 'Anwar Client',
            'email'     => 'client@gmail.com',
            'password'  => bcrypt('secret'),
            'role'      => 'user'
        ]);

        User::create([
            'name'      => 'Harun Client',
            'email'     => 'harun@gmail.com',
            'password'  => bcrypt('secret'),
            'role'      => 'user'
        ]);
    }
}
