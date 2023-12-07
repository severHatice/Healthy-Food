<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'severr',
            'admin' => true,
            'email' => 'seversireci02@gmail.com',
            'password' => Hash::make('1234'),
            'daily_calorie_target' => 2000 
        ]);
    }
}
