<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'test_team',
            'display_name' => 'Equipe de testes',
            'description' => 'Lorem ipsum',
            'sector_id' => 1
        ]);
    }
}
