<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\Models\Estadio;
use ioliga\DataTables\EstadioDataTable;
use Illuminate\Support\Facades\Auth;
use ioliga\Http\Requests\Estadio\RqGuardarEstadio;
use ioliga\Http\Requests\Estadio\RqActualizar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Estadios extends Controller
{
	protected $estadioModel;
	public function __construct(Estadio $estadioModel)
    {
        $this->middleware('auth');
        $this->estadioModel=$estadioModel;
    }

    public function index(EstadioDataTable $dataTable)
    {
    	$this->authorize('view',$this->estadioModel);
		return $dataTable->render('estadios.index');
    	
    }

    public function crear()
    {
    	$this->authorize('create',$this->estadioModel);
    	return view('estadios.crear');
    }

    public function guardar(RqGuardarEstadio $request)
    {
        $this->authorize('create',$this->estadioModel);

        $estadio=new Estadio;
        $estadio->nombre=$request->nombre;
        $estadio->direccion=$request->direccion;
        $estadio->telefono=$request->telefono;
        $estadio->usuarioCreado=Auth::id();
        if ($estadio->save()) {
            if ($request->hasFile('foto')) {
                $foto=$estadio->id.'_'.Carbon::now().'.'.$request->foto->extension();
                $path = $request->foto->storeAs('estadios', $foto,'public');
                $estadio->foto=$foto;    
                $estadio->save();
            }
        }
        $request->session()->flash('success','Nuevo estadio creado');
        return redirect()->route('estadios');
        
    }

    public function editar($CodigoEstadio)
    {
    	$estadio = Estadio::find($CodigoEstadio);    	    	
    	return view('estadios.editar',compact('estadio'));
    }

    public function actualizar(RqActualizar $request)
    {
        $this->authorize('update',User::class);
        $estadio=Estadio::findOrFail($request->estadio);    
  
    	$estadio->nombre=$request->nombre;
    	$estadio->direccion=$request->direccion;
    	$estadio->telefono=$request->telefono;
    	$estadio->usuarioActualizado=Auth::id();
    	if($estadio->save()){
            if ($request->hasFile('foto')) {
                    if ($request->file('foto')->isValid()) {
                    Storage::disk('public')->delete('estadios/'.$estadio->foto);
                    $foto=$estadio->id.'_'.Carbon::now().'.'.$request->foto->extension();
                    $path = $request->foto->storeAs('estadios', $foto,'public');
                    $estadio->foto=$foto;    
                    $estadio->save();
                }
            }         
        }
         $request->session()->flash('success','Esatoadio editado correctamente');
         return redirect('/estadios');
    }


    public function eliminar(Request $request,$idEstadio)
    {
        $this->authorize('delete',$this->estadioModel);
        $estadio=Estadio::findOrFail($idEstadio);
        try {
            $estadio->delete();
            $request->session()->flash('success','Estadio eliminado');
        } catch (\Exception $e) {
            $request->session()->flash('info','Estadio no eliminado');
        }
        return redirect()->route('estadios');
    }
}
