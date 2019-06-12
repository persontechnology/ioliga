<?php

namespace ioliga\Http\Controllers\Campeonatos;

use Illuminate\Http\Request;
use ioliga\Http\Controllers\Controller;
use ioliga\Models\Campeonato\Asignacion;
use ioliga\Models\Campeonato\AsignacionNomina;
use ioliga\Models\Nomina\Nomina;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use ioliga\Http\Requests\Campeonatos\RqCrearAsignacionNomina;
class Asignaciones extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

	/*funciones por fabian lopez*/
    public function menuAsignacion($codigoAsignacion)
    {
    	try {
	    	$asignacion=Asignacion::findOrFail(Crypt::decryptString($codigoAsignacion));
	    	$data = array('asignacion' => $asignacion);
	    	return view('asignaciones.menuAsignacion',$data);
    	} catch (DecryptException $th) {
        session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
        return redirect()->route('listar-mis-equipo');            
    	}
    }

    public function asignacionNomina($codigoAsignacion)
    {
    	try {
	    	$asignacion=Asignacion::findOrFail(Crypt::decryptString($codigoAsignacion));
            $existentesNomina=$asignacion->equipos->nominasActivas()
            ->whereNotIn('id',$asignacion->asignacionSoloNomninas->pluck('id'))->get();
            $data = array('nomina' =>$existentesNomina,'asignacion'=>$asignacion);
	    	return view('asignaciones.asignacionNomina',$data);
    	} catch (DecryptException $th) {
        session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
        return redirect()->route('listar-mis-equipo');            
    	}

    }
    public function crearAsignarNomina(RqCrearAsignacionNomina $request)
    {
    	try {
    		$asignacionNomina= new AsignacionNomina;
    		$asignacionNomina->asignacion_id=Crypt::decryptString($request->asignacion);
    		$asignacionNomina->nomina_id=Crypt::decryptString($request->jugador);    		
    		$asignacionNomina->numero=$request->numero;
    	    $asignacionNomina->usuarioCreado=Auth::id();
            $asignacionNomina->save();
            $request->session()->flash('success','Asignación creada');
            return redirect()->route('asignacion-nomina',$request->asignacion);
    	} catch (DecryptException $th) {
        session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
        return redirect()->route('listar-mis-equipo');            
    	}
    }
    public function eliminarAsignarNomina(Request $request,$idAsNo)
    {
        $asignacionNomina=AsignacionNomina::findOrFail(Crypt::decryptString($idAsNo));
      
        try {
            $asignacionNomina->delete();
            $request->session()->flash('success','Asignación de  jugador eliminado');
        } catch (\Exception $e) {
            $request->session()->flash('info','Asignación Nómina no eliminado');
        }
        return redirect()->route('asignacion-nomina',Crypt::encryptString($asignacionNomina->asignacion_id));
    }
    /*datos para otro rol*/
    public function menu($codigoAsignacion)
    {
        $asignacion=Asignacion::findOrFail($codigoAsignacion);
        $data = array('asignacion' => $asignacion);
        return view('asignaciones.menu',$data);
    }

    public function nomina($codigoAsignacion)
    {
        
        $asignacion=Asignacion::findOrFail($codigoAsignacion);
        $existentesNomina=$asignacion->equipos->nominasActivas()
        ->whereNotIn('id',$asignacion->asignacionSoloNomninas->pluck('id'))->get();
        $data = array('nomina' =>$existentesNomina,'asignacion'=>$asignacion);
        return view('asignaciones.nomina',$data);      

    }

    public function crearNomina(RqCrearAsignacionNomina $request)
    {
        try {
            $asignacionNomina= new AsignacionNomina;
            $asignacionNomina->asignacion_id=Crypt::decryptString($request->asignacion);
            $asignacionNomina->nomina_id=Crypt::decryptString($request->jugador);           
            $asignacionNomina->numero=$request->numero;
            $asignacionNomina->usuarioCreado=Auth::id();
            $asignacionNomina->save();
            $request->session()->flash('success','Nomina creada');
            return redirect()->route('nomina-asignacion',Crypt::decryptString($request->asignacion));
        } catch (DecryptException $th) {
        session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
        return redirect()->route('nomina-asignacion');            
        }       
        
       
    }
    public function eliminarNomina(Request $request,$idAsNo)
    {
        $asignacionNomina=AsignacionNomina::findOrFail($idAsNo);
      
        try {
            $asignacionNomina->delete();
            $request->session()->flash('success','Asignación de  jugador eliminado');
        } catch (\Exception $e) {
            $request->session()->flash('info','Asignación Nómina no eliminado');
        }
        return redirect()->route('nomina-asignacion',$asignacionNomina->asignacion_id);
    }
      public function estado(Request $request)
    {
         $asignacionNomina=AsignacionNomina::findOrFail($request->id);
         if($request->estado=="Habilitado"){
            $asignacionNomina->estado=true;
            $asignacionNomina->save();
            $request->session()->flash('success','Estadio Habilitado');      
         }else{
            $asignacionNomina->estado=false;
            $asignacionNomina->save();
            $request->session()->flash('info','Estadio inactivo');            
         }       
      
    }
}



