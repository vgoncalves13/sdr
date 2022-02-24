<?php

namespace Database\Seeders;

use App\Models\People;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'login' => 'admin',
            'password' => bcrypt('admin')
        ]);
        People::create([
           'user_id' => $user->id,
           'name' => 'Administrador',
           'UF' => 'RJ',
           'email' => 'admin@mailinator.com',
           'manager_id' => $user->id,
           'sector_id' => 1,
           'telephone' => '9999999',
        ]);
    }
}
