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

        /*permisos para campeonato*/
        $p_ver_campeonatos=Permission::updateOrCreate(['name' => 'Ver campeonatos']);
        $p_crear_campeonatos=Permission::updateOrCreate(['name' => 'Crear campeonatos']);
        $p_actualizar_campeonatos=Permission::updateOrCreate(['name' => 'Actualizar campeonatos']);
        $p_eliminar_campeonatos=Permission::updateOrCreate(['name' => 'Eliminar campeonatos']);

        /*permisos para equipo*/
        $p_ver_categorias=Permission::updateOrCreate(['name' => 'Ver categorias']);

        /*permisos para nominas*/
        $p_ver_equipo_representante=Permission::updateOrCreate(['name' => 'Ver equipo representante']);
        $p_actualizar_mi_equipo=Permission::updateOrCreate(['name' => 'Actualizar equipo representante']);
        $p_ver_nomina_representante=Permission::updateOrCreate(['name' => 'Ver nómina representante']);
        $p_crear_jugadores_representante=Permission::updateOrCreate(['name' => 'Crear jugadores representante']);

        

    }
}
