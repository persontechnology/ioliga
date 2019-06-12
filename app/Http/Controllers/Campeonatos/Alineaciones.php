<?php

namespace ioliga\Http\Controllers\Campeonatos;

use Illuminate\Http\Request;
use ioliga\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ioliga\Models\Campeonato\Partido;
use ioliga\Models\Campeonato\AsignacionNomina;
use ioliga\Models\Campeonato\Asignacion;
use ioliga\Models\Campeonato\Alineacion;

class Alineaciones extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
	public function Index($codigoPar,$codigoAsignacion)
	{
		$partido=Partido::findOrFail($codigoPar);
		$asignacion=Asignacion::findOrFail($codigoAsignacion);
		$existeAsignacioNomina=$asignacion->asignacionNominasPartido()
		->whereNotIn('id',$partido->alineaciones->pluck('asignacionNomina_id'))->get();
		$alineacion=$asignacion->partidoAsignacionAlineacion()
		->whereIn('partido_id',[$partido->id])->get();
			
		$data = array('partido' =>$partido ,'asignacion'=>$asignacion,'asistenciaNomina'=>$existeAsignacioNomina,'alineacion'=>$alineacion);
		return view('campeonatos.alineaciones.index',$data);
		
	}

	public function guardarAlineacion(Request $request)
	{
		$alineacion=new Alineacion;
		$alineacion->detalle="Inicio";
		$alineacion->asignacionNomina_id=$request->nomina;
		$alineacion->partido_id=$request->partido;
		$alineacion->amarillas=0;
		$alineacion->rojas=0;
		$alineacion->goles=0;
		$alineacion->usuarioCreado=Auth::id();

		$alineacion->save();
		session()->flash('success','Jugador asignado al partido existosamente !');
        return redirect()->route('alineacion',[$request->partido,$request->asignacion]);  
	}
	public function actualizarResultados(Request $request)
	{
		$alineacion=Alineacion::findOrFail($request->alineacion);
		$alineacion->amarillas=$request->amarillas;
		$alineacion->rojas=$request->rojas;
		$alineacion->goles=$request->goles;
		$alineacion->usuarioCreado=Auth::id();
		$alineacion->save();
		session()->flash('success','Datos Ingresados existosamente !');
        return redirect()->route('alineacion',[$request->partido,$request->asignacion]);
	}
    
}
