<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'vendor1',
            'email' => 'vendor1@gmail.com.com',
            'password' => bcrypt('123456'),
            'role_id' => 5,
        ]);
    }
}
