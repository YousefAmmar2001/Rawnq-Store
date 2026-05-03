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
            'email' => 'yousefbassamaliammar@gmail.com',
            'password' => Hash::make('1234'),
            'phone_number' => '0595652372',
        ]);
    }
}
