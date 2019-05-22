<?php

namespace ioliga\Http\Controllers\Campeonatos;

use Illuminate\Http\Request;
use ioliga\Http\Controllers\Controller;
use ioliga\Models\Equipo\Genero;
use ioliga\Models\Campeonato\Serie;
use ioliga\Models\Campeonato\GeneroSerie;

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
}
