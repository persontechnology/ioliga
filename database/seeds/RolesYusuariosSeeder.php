<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use ioliga\User;
use Illuminate\Support\Facades\Hash;
class RolesYusuariosSeeder extends Seeder
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

        

        /*roles*/
        /*rola super adminsitrador*/
        $roleS_Admin = Role::updateOrCreate(['name' => 'SuperAdministrador']);
        /*rol administrador*/
        $roleAdmin = Role::updateOrCreate(['name' => 'Administrador']);
        
        /*asiganr permisos a roles*/
        /*$roleS_A->givePermissionTo($permiso_aqui);*/

        /*usuarios*/
        
        $userS_Admin= User::updateOrCreate([
            'name' => 'soysoftware',
            'email' => 'info@soysoftware.com',
            'password' => Hash::make('12345678')
        ]);
        $userS_Admin->assignRole($roleS_Admin);

         $userAdmin= User::updateOrCreate([
            'name' => 'administrador',
            'email' => 'soysoftware@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        /*asiganar roles a usuarios*/
        $userAdmin->assignRole($roleAdmin);
    }
}
