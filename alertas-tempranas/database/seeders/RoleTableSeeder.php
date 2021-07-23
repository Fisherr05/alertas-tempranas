<?php

namespace Database\Seeders;

use App\Models\Role as ModelsRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      /* $rol1=Role::create(['name'=> 'admin']);
        $rol2=Role::create(['name'=> 'user']);

        Permission::create(['name' => 'admin.monitoreo'])->assignRole($rol1);
        Permission::create(['name' => 'admin.finca'])->assignRole($rol1);
        Permission::create(['name' => 'admin.zona'])->assignRole($rol1);
        Permission::create(['name' => 'admin.estudio'])->assignRole($rol1);
        Permission::create(['name' => 'admin.tecnico'])->assignRole($rol1);
        Permission::create(['name' => 'admin.variedad'])->assignRole($rol1);
        Permission::create(['name' => 'admin.planta'])->assignRole($rol1);
        Permission::create(['name' => 'admin.dato'])->assignRole($rol1);*/
    }
}
