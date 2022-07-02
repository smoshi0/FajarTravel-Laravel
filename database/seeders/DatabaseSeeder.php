<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin Fajar Travel',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'level' => 'admin'
        ]);

        User::create([
            'name' => 'Bayu Dirga',
            'username' => 'bayudirga',
            'password' => bcrypt('12345'),
            'level' => 'user'
        ]);
    }
}
