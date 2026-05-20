<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
            'name' => 'Yousef Ammar',
            'email' => 'y0595652372@gmail.com',
            'password' => Hash::make('11111111'),
            'phone_number' => '0595652372',
        ]);
        User::create([
            'name' => 'Mohammed Ammar',
            'email' => 'm0595652372@gmail.com',
            'password' => Hash::make('22222222'),
            'phone_number' => '0569809226',
        ]);
        User::create([
            'name' => 'Marwan Ammar',
            'email' => 'me0595652372@gmail.com',
            'password' => Hash::make('33333333'),
            'phone_number' => '0594567885',
        ]);
    }
}
