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
        $p_restaurar_estadio=Permission::updateOrCreate(['name' => 'Restaurar estadios']);
        $p_forzar_eliminacion_estadio=Permission::updateOrCreate(['name' => 'Forzar eliminacion estadios']);
    }
}
