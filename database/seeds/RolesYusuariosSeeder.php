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
        $roleSuperAdministrador = Role::updateOrCreate(['name' => 'SuperAdministrador']);
        /*rol administrador*/
        $roleAdministrador = Role::updateOrCreate(['name' => 'Administrador']);
        /*rol jugador*/
        $roleJugador = Role::updateOrCreate(['name' => 'Jugador']);
        /*rol representante de equipo*/
        $roleRepresentanteEquipo = Role::updateOrCreate(['name' => 'Representante de equipo']);
        /*rol de comisionado calendarizado*/
        $roleComisionadoDeCalendarizacion = Role::updateOrCreate(['name' => 'Comisionado de calendarización']);
        /*rol de secretario*/
        $roleSecreatario=Role::updateOrCreate(['name' => 'Secretario']);
        $roleArbitro=Role::updateOrCreate(['name' => 'Arbitro']);


        /*asiganr permisos a roles*/
        /*$roleS_A->givePermissionTo($permiso_aqui);*/

        /*usuarios*/
        
        $userSuperAdministrador= User::updateOrCreate([
            'name' => 'super-admin',
            'email' => 'info@sa.com',
            'password' => Hash::make('12345678')
        ]);
        $userSuperAdministrador->assignRole($roleSuperAdministrador);

         $userAdministrador= User::updateOrCreate([
            'name' => 'administrador',
            'email' => '    ',
            'password' => Hash::make('sam1724539869')
        ]);

        /*asiganar roles a usuarios*/
        $userAdministrador->assignRole($roleAdministrador);
    }
}
