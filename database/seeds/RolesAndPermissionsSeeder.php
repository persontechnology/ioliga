<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use ioliga\User;
use Illuminate\Support\Facades\Hash;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        $p_crear_ligas=Permission::create(['name' => 'Crear ligas']);
        $role = Role::create(['name' => 'SuperAdministrador']);
        $role->givePermissionTo($p_crear_ligas);

        $user= User::create([
            'name' => 'soysoftware',
            'email' => 'info@soysoftware.com',
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole($role);
    }
}
