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
            'email' =>'admin@mail.com',
            'password' =>Hash::make('admin'),
            'fullacces' => 'yes',
            'institucion'=>'',
            'telefono'=>'',
            'activo'=>'',
        ]);



        User::create([
            'name' =>'Usuario',
            'email' =>'usuario@mail.com',
            'institucion'=>'',
            'password' =>Hash::make('user'),
            'telefono'=>'',
            'fullacces' => 'no',
            'activo'=>'',
        ]);

    }
}
