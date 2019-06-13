<?php

namespace ioliga\Http\Controllers\Campeonatos;

use Illuminate\Http\Request;
use ioliga\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ioliga\Models\Campeonato\Etapa;
use ioliga\Http\Requests\Etapas\RqCrear;
use ioliga\Models\Campeonato\GeneroSerie;
use ioliga\Models\Campeonato\EtapaSerie;
use ioliga\Http\Requests\Etapas\RqCrearEtapaSerie;
class Etapas extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
	//queda libre para una proxima implementacaion
    public function index($codigoSerie)
    {


    }
    public function etapasSerie($codigoSerie)
    {
    	$this->authorize('Ver etapas',Etapa::class);
    	$generoSerie=GeneroSerie::findOrFail($codigoSerie);      
    	$etapas=Etapa::get();   	
    	$data = array('etapas' =>$etapas ,'generoSerie'=>$generoSerie);
    	return view('campeonatos.etapas.etapasSerie',$data);
    	
    }

    public function guradarEtapa(RqCrear $request)
    {
    	$this->authorize('Crear etapa',Etapa::class);
    	$etapa=new Etapa;
    	$etapa->nombre=$request->nombre;
    	$etapa->detalle=$request->detalle;
    	$etapa->usuarioCreado=Auth::id();
    	$etapa->save();
    	session()->flash('success','La etapa creada existosamente !');
        return redirect()->route('etapas-serie',$request->generoSerie);
    	/*$etapa->nombre=*/
    }
    public function guardarEtapaSerie(RqCrearEtapaSerie $request)
    {
    	$this->authorize('Crear etapa',Etapa::class);
    	$etapaSerie=new EtapaSerie;
    	$etapaSerie->generoSerie_id=$request->generoSerie;
		$etapaSerie->etapa_id=$request->etapa;
		$etapaSerie->usuarioCreado=Auth::id();
		$etapaSerie->save();
		session()->flash('success','La etapa se asignó correctamente a la serie !');
        return redirect()->route('etapas-serie',$request->generoSerie);

    }
        public function eliminarEtapaSerie(Request $request,$idEtapa)
    {
        $etapaSerie=EtapaSerie::findOrFail($idEtapa);
        /*$this->authorize('eliminar',$campeonato);*/
        try {
            $etapaSerie->delete();
            $request->session()->flash('success','La etapa de la serie fue eliminada');
        } catch (\Exception $e) {
            $request->session()->flash('info','La etapa de la serie no eliminado, ya que contiene información relacionada');
        }
        return redirect()->route('etapas-serie',$etapaSerie->generoSerie_id);
    }

}
