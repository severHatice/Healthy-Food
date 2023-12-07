<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use AdminUserSeeder;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //\App\Models\User::factory(10)->create();
      $this->call(AdminUserSeeder::class);

        //  $user = User::factory()->create([
        //      'name' => 'healty food',
        //     'email' => 'healty.food@gmail.com',
        //     'password' =>bcrypt('password'),
        //  ]);
    }
}
