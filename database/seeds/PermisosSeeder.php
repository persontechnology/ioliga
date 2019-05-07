<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /*permisos para estadios*/
        $p_ver_estadio=Permission::updateOrCreate(['name' => 'Ver estadios']);
        $p_crear_estadio=Permission::updateOrCreate(['name' => 'Crear estadios']);
        $p_actualizar_estadio=Permission::updateOrCreate(['name' => 'Actualizar estadios']);
        $p_eliminar_estadio=Permission::updateOrCreate(['name' => 'Eliminar estadios']);
        

        /*permisos para usuarios*/
        $p_ver_usuarios=Permission::updateOrCreate(['name' => 'Ver usuarios']);
        $p_crear_usuarios=Permission::updateOrCreate(['name' => 'Crear usuarios']);
        $p_actualizar_usuarios=Permission::updateOrCreate(['name' => 'Actualizar usuarios']);
        $p_eliminar_usuarios=Permission::updateOrCreate(['name' => 'Eliminar usuarios']);
        

    }
}
