<?php

namespace Database\Seeders;

use App\Models\CoverageSource;
use Illuminate\Database\Seeder;

class Sources extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Claro

        CoverageSource::create([
            'postal_code_field' => 'cep_claro',
            'carrier_id' => 2,
            'number_field' => 'Num_Fachada_Claro',
            'table_name' => 'OP_CLARO'
        ]);

        //Vivo

        CoverageSource::create([
            'postal_code_field' => 'cep',
            'carrier_id' => 1,
            'number_field' => 'Num_Fachada',
            'table_name' => 'OP_VIVO_CELLVIX'
        ]);
    }
}
