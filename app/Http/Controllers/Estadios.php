<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\Models\Estadio;
use ioliga\DataTables\EstadioDataTable;
use Illuminate\Support\Facades\Auth;

class Estadios extends Controller
{
    public function index(EstadioDataTable $dataTable)
    {
    	 return $dataTable->render('estadios.index');
    }

    public function editar($CodigoEstadio)
    {
    	$estadio = Estadio::find($CodigoEstadio);    	    	
    	return view('estadios.editar',compact('estadio'));
    }

    public function actualizar(Request $request, $id)
    {
    	$request->validate([
    		'nombre'=>'required|unique:estadio,nombre,'.$id,
    		'direccion'=>'required',
    		'telefono'=>'nullable|digits_between:6,10',
    	]);
    	$idUser=Auth::user()->id;
    	$estadio=Estadio::find($id);
    	$estadio->nombre=$request->nombre;
    	$estadio->direccion=$request->direccion;
    	$estadio->telefono=$request->telefono;
    	$estadio->usuarioActualizado=$idUser;
    	$estadio->save();
    	 return redirect('/estadios');
    }

}
