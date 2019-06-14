<?php

namespace ioliga\Http\Controllers\Campeonatos;

use Illuminate\Http\Request;
use ioliga\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ioliga\Models\Campeonato\EtapaSerie;
use ioliga\Models\Campeonato\Fecha;
use ioliga\User;
use ioliga\Models\Estadio;
use ioliga\Models\Campeonato\Partido;
use ioliga\Models\Campeonato\Tabla;
use ioliga\Http\Requests\Fechas\RqCrear;
use ioliga\Http\Requests\Partidos\RqCrearPartido;
use ioliga\Models\Campeonato\Asignacion;
use Illuminate\Support\Facades\DB;
use ioliga\Models\Campeonato\Resultado;

class Fechas extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($codigoEserie)
    {
    	/*$this->authorize('Ver fechas',Fecha::class);*/
    	$etapaSerie=EtapaSerie::findOrFail($codigoEserie);    	  	
    	$data = array('etapasSerie' =>$etapaSerie );
    	return view('campeonatos.fechas.index',$data);
    }
    public function crearFecha(RqCrear $request)
    {
        $etapaSerie=EtapaSerie::findOrFail($request->etapa);      
    	$fecha=new Fecha;
    	$fecha->etapaSerie_id=$etapaSerie->id;
    	$fecha->nombre="Fecha";
        $fecha->fechaInicio=$request->fecha;
    	$fecha->usuarioCreado=Auth::id();
    	$fecha->save(); 
    	session()->flash('success','Fecha creada existosamente !');
        return redirect()->route('fechas-etapa',$etapaSerie->id);   	
    }
    public function fecha($codigoFecha)
    {
       $fecha=Fecha::findOrFail($codigoFecha);
       
        $asignacioncionAsc=$fecha->etapaSerie->generoSerie->asignacionAsc()
       ->whereNotIn('id',$fecha->partidos->pluck('asignacion1_id'))
       ->whereNotIn('id',$fecha->partidos->pluck('asignacion2_id'))->get(); 

       $asignacioncionDes=$fecha->etapaSerie->generoSerie->asignacionDes()
       ->whereNotIn('id',$fecha->partidos->pluck('asignacion1_id'))
       ->whereNotIn('id',$fecha->partidos->pluck('asignacion2_id'))->get();   
     
       $estadio=Estadio::where('estado',1)->get();
       $data= array('fecha' =>  $fecha,'asignacioncionAsc'=>$asignacioncionAsc,'asignacioncionDes'=>$asignacioncionDes,'estadio'=> $estadio );
       return view('campeonatos.fechas.fecha',$data);
    }

    public function eliminarFecha(Request $request,$idFecha)
    {
        $fecha=Fecha::findOrFail($idFecha);
        /*$this->authorize('eliminar',$campeonato);*/
        try {
            $fecha->delete();
            $request->session()->flash('success','La fecha de la etapa fue eliminada');
        } catch (\Exception $e) {
            $request->session()->flash('info','La fecha de la etapa no eliminado, ya que contiene información relacionada');
        }
        return redirect()->route('fechas-etapa',$fecha->etapaSerie_id);
    }
    public function guardarPartidos(RqCrearPartido $request)
    {
      try {
            DB::beginTransaction();
            $partido=new Partido;
            $partido->hora=$request->hora;
            $partido->fecha_id=$request->fecha;
            $partido->asignacion1_id=$request->primerequipo;
            $partido->asignacion2_id=$request->segundoequipo;
            $partido->estadio_id=$request->estadio;
            $partido->tipo="Proceso";
            $partido->usuarioCreado=Auth::id();
            $partido->save();
            /* Guardar la asignacin para la tabloa de posiones */
            $asignacion1=Asignacion::findOrFail($request->primerequipo);
            $asignacion2=Asignacion::findOrFail($request->segundoequipo);
            $fecaha=Fecha::findOrFail($request->fecha);
            if($asignacion1->tablas->count()==0){
                $tabla=new Tabla;
                $tabla->etapaSerie_id=$fecaha->etapaSerie->id;
                $tabla->asignacion_id=$asignacion1->id;
                $tabla->usuarioCreado=Auth::id();
                $tabla->save();

            }
             if($asignacion2->tablas->count()==0){
                $tabla1=new Tabla;
                $tabla1->etapaSerie_id=$fecaha->etapaSerie->id;
                $tabla1->asignacion_id=$asignacion2->id;
                $tabla1->usuarioCreado=Auth::id();
                $tabla1->save();

            }
            DB::commit();
            $request->session()->flash('success','Partido creado existosamente !');
        } catch (\Exception $e) {
            $request->session()->flash('info','Partido no creado');
            DB::rollBack();
        }        
        return redirect()->route('fecha',$request->fecha);
    }

    public function eliminarpartido(Request $request,$idPartido)
    {
         try {
            DB::beginTransaction();
            $partido=Partido::findOrFail($idPartido);
            /*return $partido->fecha->etapaSerie->tablas;*/
            $equipo1=Asignacion::findOrFail($partido->asignacion1_id);
            $equipo2=Asignacion::findOrFail($partido->asignacion2_id);
            $consultaEquipo1=$partido->fecha->etapaSerie->tablas()
            ->whereIn('asignacion_id',[$equipo1->id])->get();
            $consultaEquipo2=$partido->fecha->etapaSerie->tablas()
            ->whereIn('asignacion_id',[$equipo2->id])->get();
            $existe1=$consultaEquipo1->whereIn('id',$partido->resultados
            ->pluck('tabla_id'));
            $existe2=$consultaEquipo2->whereIn('id',$partido->resultados
            ->pluck('tabla_id'));
             if($existe1->count()==0){
              $eliminar1=$consultaEquipo1->first(); 
              $eliminar1->delete(); 
            }
            if($existe2->count()==0){
              $eliminar2=$consultaEquipo2->first();
              $eliminar2->delete(); 
            }
            $partido->delete();
            DB::commit();
            $request->session()->flash('success','Partido eliminado existosamente !');
        } catch (\Exception $e) {
            $request->session()->flash('info','Partido no se puede eliminar');
            DB::rollBack();
        }        
        return redirect()->route('fecha',$partido->fecha_id);       
    }

     public function estadoPartido(Request $request)
    {
        try {
            DB::beginTransaction();
            $partido=Partido::findOrFail($request->partido);
            $asignacion1=Asignacion::findOrFail($partido->asignacion1_id);
            $asignacion2=Asignacion::findOrFail($partido->asignacion2_id);
            $tipo;
            if($request->estado=="Finalizado"){
                /*validar si no existe en la tabla asignacion 1*/
                $fecaha=Fecha::findOrFail($partido->fecha_id);
                if($asignacion1->tablas->count()==0){
                   $this->guardarResultadosEstado($partido->id,$asignacion1->id,$asignacion2->id);
                }else{
                    $this->crearResultado($partido->id,$asignacion1->id,$asignacion2->id);
                }           
                if($asignacion2->tablas->count()==0){
                   $this->guardarResultadosEstado($partido->id,$asignacion2->id,$asignacion1->id);

                }else{
                    $this->crearResultado($partido->id,$asignacion2->id,$asignacion1->id); 
                }
                $partido->tipo="Finalizado";
                $partido->usuarioActualizado=Auth::id();
                $partido->save();

            }
            if($request->estado=="Diferido"){
                $partido->tipo="Diferido";
                $partido->usuarioActualizado=Auth::id();
                $partido->save();
               $liminarPartido=$partido->resultados->count();
               if($liminarPartido>0){
                foreach ($partido->resultados as $resultado) {
                    $resul=Resultado::findOrFail($resultado->id);
                    $resul->delete();
                }
               }

            }
            if($request->estado=="Proceso"){
                $partido->tipo="Proceso";
                $partido->usuarioActualizado=Auth::id();
                $partido->save();
                $liminarPartido=$partido->resultados->count();
                if($liminarPartido>0){
                foreach ($partido->resultados as $resultado) {
                    $resul=Resultado::findOrFail($resultado->id);
                    $resul->delete();
                }
               }
            }
             DB::commit();
            $request->session()->flash('success','Partido ' . $request->estado . ' existosamente !');
        } catch (\Exception $e) {
            $request->session()->flash('info','El partido no puede cambiar de estado');
            DB::rollBack();
        }
        
    }
    public function verificarTabla($idTabla,$idPartido)
    {
       $partido=Resultado::where('tabla_id',$idTabla)->where('partido_id',$idPartido)->count();
       return $partido;
    }
    public function guardarResultadosEstado($idPartido,$asignacion1_id,$asignacion2_id)
    {
        $partido=Partido::findOrFail($idPartido);
         $fecaha=Fecha::findOrFail($partido->fecha_id);
        $asignacion1=Asignacion::findOrFail($asignacion1_id);
        $asignacion2=Asignacion::findOrFail($asignacion2_id);
        $tabla=new Tabla;
        $tabla->etapaSerie_id=$fecaha->etapaSerie->id;
        $tabla->asignacion_id=$asignacion1->id;
        $tabla->usuarioCreado=Auth::id();
        $tabla->save();
        if($this->verificarTabla($tabla->id,$partido->id)==0){
        $resultado=new Resultado;
        $resultado->tabla_id=$tabla->id;
        $resultado->partido_id=$partido->id;
        $resultado->golesFavor=$asignacion1->calculoDeGOles($partido->id);
        $resultado->golesContra=$asignacion2->calculoDeGOles($partido->id);
        $estado;
            if ($asignacion1->calculoDeGOles($partido->id)>$asignacion2->calculoDeGOles($partido->id)) {
                 $estado="Ganado";
            }
             if ($asignacion1->calculoDeGOles($partido->id)==$asignacion2->calculoDeGOles($partido->id)) {
                 $estado="Empate";
            }
             if ($asignacion1->calculoDeGOles($partido->id)<$asignacion2->calculoDeGOles($partido->id)) {
                 $estado="Perdido";
            }
            $resultado->estado=$estado;
            $resultado->usuarioCreado=Auth::id();
            $resultado->save();
        }
    }
    public function crearResultado($partido,$asignacion1id,$asignacion2id)
    {
                $partido=Partido::findOrFail($partido);                
                $asignacion1=Asignacion::findOrFail($asignacion1id);
                $asignacion2=Asignacion::findOrFail($asignacion2id);
                $tabla=Tabla::where('asignacion_id',$asignacion1->id)->first();
        $resultadoCont=Resultado::where('tabla_id',$tabla->id)->where('partido_id',$partido->id)->count();
        if($resultadoCont==0){
            $resultado=new Resultado;
            $resultado->tabla_id=$tabla->id;
            $resultado->partido_id=$partido->id;
            $resultado->golesFavor=$asignacion1->calculoDeGOles($partido->id);
            $resultado->golesContra=$asignacion2->calculoDeGOles($partido->id);
            $estado;
                if ($asignacion1->calculoDeGOles($partido->id)>$asignacion2->calculoDeGOles($partido->id)) {
                     $estado="Ganado";
                }
                 if ($asignacion1->calculoDeGOles($partido->id)==$asignacion2->calculoDeGOles($partido->id)) {
                     $estado="Empate";
                }
                 if ($asignacion1->calculoDeGOles($partido->id)<$asignacion2->calculoDeGOles($partido->id)) {
                     $estado="Perdido";
                }
                $resultado->estado=$estado;
                $resultado->usuarioCreado=Auth::id();
                $resultado->save();
        }else{
            $edires=Resultado::where('tabla_id',$tabla->id)->where('partido_id',$partido->id)->first();
            $edires->tabla_id=$tabla->id;
            $edires->partido_id=$partido->id;
            $edires->golesFavor=$asignacion1->calculoDeGOles($partido->id);
            $edires->golesContra=$asignacion2->calculoDeGOles($partido->id);
            $estado;
            if ($asignacion1->calculoDeGOles($partido->id)>$asignacion2->calculoDeGOles($partido->id)) {
                 $estado="Ganado";
            }
             if ($asignacion1->calculoDeGOles($partido->id)==$asignacion2->calculoDeGOles($partido->id)) {
                 $estado="Empate";
            }
             if ($asignacion1->calculoDeGOles($partido->id)<$asignacion2->calculoDeGOles($partido->id)) {
                 $estado="Perdido";
                    }
            $edires->estado=$estado;
            $edires->usuarioCreado=Auth::id();
            $edires->save();
        }
    }
}
