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
        $p_listar_equipos_categorias=Permission::updateOrCreate(['name' => 'Listar equipos categorias']);
        $p_crear_equipos=Permission::updateOrCreate(['name' => 'Crear equipos']);
        $p_actualizar_equipos=Permission::updateOrCreate(['name' => 'Actualizar equipo']);
        $p_eliminar_equipos=Permission::updateOrCreate(['name' => 'Eliminar equipo']);
        $p_listar_nomina_equipos=Permission::updateOrCreate(['name' => 'Listar nómina equipo']);
        $p_crear_jugador_equipos=Permission::updateOrCreate(['name' => 'Crear jugador equipo']);
        $p_Actualizar_foto_jugador=Permission::updateOrCreate(['name' => 'Actualizar foto jugador']);

        /*permisos para las etapas del campeonato*/
        $p_Ver_etapas=Permission::updateOrCreate(['name' => 'Ver etapas']);  
        $p_Crear_etapas=Permission::updateOrCreate(['name' => 'Crear etapa']);

        /*permimsos para las fechas*/
        $p_Ver_fechas=Permission::updateOrCreate(['name' => 'Ver fechas']); 
         $p_adminstrar_fechas=Permission::updateOrCreate(['name' => 'Administrar fechas']); 

         /*permisos tabla*/
         $p_actualizar_bonificacion=Permission::updateOrCreate(['name' => 'Actualizar bonificación']); 

         /*permisos para ve los partidos*/
        $p_Ver_partidos=Permission::updateOrCreate(['name' => 'Ver partidos']);
        $p_adminstrar_partidos=Permission::updateOrCreate(['name' => 'Administrar partidos']); 
        /*permisos para la asignacion*/ 
        $p_ver_asignacion_equipo=Permission::updateOrCreate(['name' => 'Ver asignacion equipo']);
          
          
        /*permisos para nominas*/
        $p_ver_equipo_representante=Permission::updateOrCreate(['name' => 'Ver equipo representante']);
        $p_actualizar_mi_equipo=Permission::updateOrCreate(['name' => 'Actualizar equipo representante']);
        $p_ver_nomina_representante=Permission::updateOrCreate(['name' => 'Ver nómina representante']);
        $p_crear_jugadores_representante=Permission::updateOrCreate(['name' => 'Crear jugadores representante']);
        $p_actualizar_imagen_jugadores_nomina=Permission::updateOrCreate(['name' => 'Actualizar imagen jugador representante']);
        
        /*permisos para ver mis equipos representante*/

        $p_ver_mis_campeonatos=Permission::updateOrCreate(['name' => 'Ver mis campeonatos']);

        // acceso a toda la gestion de noticias
        $p_administrar_noticias=Permission::updateOrCreate(['name' => 'Administrar noticias']);


    }
}
