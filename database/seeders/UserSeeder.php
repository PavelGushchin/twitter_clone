<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'Pavel Gushchin',
            'nickname' => 'pavgu1990',
            'email' => 'pavel_gushchin@mail.ru',
            'password' => Hash::make('12345678'),
        ]);
    }
}
