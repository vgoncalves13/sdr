<?php

namespace Database\Seeders;

use App\Models\Carrier;
use Illuminate\Database\Seeder;

class CarrierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrier::create(['name' => 'Vivo']);
        Carrier::create(['name' => 'Claro']);
        Carrier::create(['name' => 'Tim']);
        Carrier::create(['name' => 'Oi']);
    }
}
