<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
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
            'name' =>'Administrador',
            'email' =>'admin@gmail.com',
            'password' =>Hash::make('admin'),
            'fullacces' => 'yes',
            'codigo' => 'adm1',
        ]);



        User::create([
            'name' =>'Usuario',
            'email' =>'usuario@gmail.com',
            'password' =>Hash::make('user'),
            'fullacces' => 'no',
            'codigo' => 'cas1',
        ]);

    }
}
