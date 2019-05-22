<?php

namespace ioliga\Http\Controllers\Campeonatos;

use Illuminate\Http\Request;
use ioliga\Http\Controllers\Controller;
use ioliga\Models\Equipo\Genero;
use ioliga\Models\Campeonato\Serie;
use ioliga\Models\Campeonato\GeneroSerie;
use ioliga\Models\Equipo\Equipo;
use Illuminate\Support\Facades\Auth;
class Series extends Controller
{
    public function index(Request $request,$idGenero)
    {
    	
    	$genero=Genero::findOrFail($idGenero);
    	$seriesNo=Serie::whereNotIn('id',$genero->series->pluck('id'))->get();
    	$seriesSi=$genero->series;
    	
    	$data = array('genero' => $genero,'seriesSi'=>$seriesSi,'seriesNo'=>$seriesNo );
    	return view('campeonatos.series.index',$data);
    }

    public function agregar(Request $request)
    {
        
    	$genero=Genero::findOrFail($request->genero);
    	$genero->series()->sync($request->series);
    	$request->session()->flash('success','Series actualizado');
    	return redirect()->route('series',$request->genero);
    }

    
    public function asignarEquiposAserie(Request $request,$idGeneroSerie)
    {
        $gs=GeneroSerie::findOrFail($idGeneroSerie);
        $equiposSi=$gs->equipos;
        $equiposNo=Equipo::whereNotIn('id',$gs->equipos->pluck('id'))->get();
        $data = array('equiposSi' => $equiposSi,'equiposNo'=>$equiposNo,'generoSerie'=>$gs );
        return view('campeonatos.series.asignarEquiposAserie',$data);
    }


    public function agregarEquipoAserie(Request $request){
        $validatedData = $request->validate([
            'equipos' => 'nullable|array',
            'equipos.*' => 'exists:equipo,id',
            'serie' => 'required|exists:generoSerie,id',
        ]);
        
        $gs=GeneroSerie::findOrFail($request->serie);
        if(Auth::user()->can('serieEnCampeonatoActivo',$gs->genero->campeonato)){
            $gs->equipos()->sync($request->equipos);
            $request->session()->flash('success','Equipos asignados');
        }else{
            $request->session()->flash('info','Equipos no asignados, vuelva intentar');
        }
        return redirect()->route('asignarEquiposAserie',$request->serie);
    }
}
