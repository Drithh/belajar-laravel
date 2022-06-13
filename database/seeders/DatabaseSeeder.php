<?php

namespace Database\Seeders;

use App\Models\BukuTamu;
use App\Models\Player;
use App\Models\PlayerTeam;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        BukuTamu::factory(10)->create();
        PlayerTeam::factory(6)->create();
        Player::factory(40)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => bcrypt('adminadmin')
        ]);
    }
}
