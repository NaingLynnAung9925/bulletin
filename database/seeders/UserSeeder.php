<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'image' => '/images/profile.png',
            'type' => '0',
            'phone' => '097777777',
            'address' => 'Yangon',
            'dob' => '1999/9/9',
            'created_user_id' => 1,
            'updated_user_id' => 1
        ]);
    }
}
