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

use ioliga\Http\Requests\Fechas\RqCrear;
use ioliga\Http\Requests\Partidos\RqCrearPartido;

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

      /* $asignacioncionAsc=$fecha->etapaSerie->buscarPartidoRepetidos()
       ->whereIn('asignacion1_id',[4])
       ->whereIn('asignacion2_id',[6])->get();
       return $asignacioncionAsc;*/
       
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
        $partido=new Partido;
        $partido->hora=$request->hora;
        $partido->fecha_id=$request->fecha;
        $partido->asignacion1_id=$request->primerequipo;
        $partido->asignacion2_id=$request->segundoequipo;
        $partido->estadio_id=$request->estadio;
        $partido->tipo="Proceso";
        $partido->usuarioCreado=Auth::id();
        $partido->save();
        $request->session()->flash('success','Partido creado existosamente !');
        return redirect()->route('fecha',$request->fecha);
    }
}
