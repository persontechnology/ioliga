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
        
        /*permisos*/        
        $p_menu_estadio=Permission::create(['name' => 'Menu estadio']);

        /*roles*/
        /*rola super adminsitrador*/
        $roleS_Admin = Role::create(['name' => 'SuperAdministrador']);
        /*rol administrador*/
        $roleAdmin = Role::create(['name' => 'Administrador']);
        
        /*asiganr permisos a roles*/
        /*$roleS_A->givePermissionTo($p_menu_estadio);*/

        /*usuarios*/
        
        $userS_Admin= User::create([
            'name' => 'soysoftware',
            'email' => 'info@soysoftware.com',
            'password' => Hash::make('12345678')
        ]);
        $userS_Admin->assignRole($roleS_Admin);

         $userAdmin= User::create([
            'name' => 'administrador',
            'email' => 'info@administrador.com',
            'password' => Hash::make('12345678')
        ]);

        /*asiganar roles a usuarios*/
        $userAdmin->assignRole($roleAdmin);
    }
}
