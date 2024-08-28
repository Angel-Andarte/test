<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissionManageUsers = Permission::create(['name' => 'administrar usuarios']);
        $permissionManageProducts = Permission::create(['name' => 'gestionar productos']);
        $permissionViewReports = Permission::create(['name' => 'listar ingresos']);

        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleCliente = Role::create(['name' => 'Cliente']);

        $roleAdmin->givePermissionTo([$permissionManageUsers, $permissionManageProducts, $permissionViewReports]);

        //$user = User::find(1);
        //$user->assignRole('Administrador');

    }
}

