<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'email' => 'user@otapp.net',
            'password' => Hash::make('secret'),
            'name' => 'End User'
        ]);

        Admin::create([
            'name' => 'Administrator',
            'email' => 'admin@otapp.net',
            'password' => Hash::make('secret')
        ]);

        Agent::create([
            'name' => 'Event Owner',
            'email' => 'agent@otapp.net',
            'password' => Hash::make('secret')
        ]);
    }
}
