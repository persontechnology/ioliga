<?php

namespace ioliga\Http\Controllers\Seguridades;

use Illuminate\Http\Request;
use ioliga\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use PDF;
class Roles extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:SuperAdministrador|Administrador']);
    }	

    public function index()
    {
    	$data = array('roles' => Role::whereNotIn('name',['SuperAdministrador','Administrador'])->get(),'permisos'=>Permission::all() );
    	return view('seguridades.roles.index',$data);
    }


    public function actualizarPermisos(Request $request)
    {
    	$validatedData = $request->validate([
    		"rol"  => "required|exists:roles,id",
	        "permisos"    => "required|array",
        	"permisos.*"  => "required|exists:permissions,id",
	    ]);
    	$request->session()->flash('success','Permisos actualizados');
    	$rol=Role::findOrFail($request->rol);
    	$rol->syncPermissions($request->permisos);
    	return redirect()->route('roles');
    }

    public function eliminar(Request $request,$idRol)
    {
    	try {
    		$rol=Role::destroy($idRol);
    		$request->session()->flash('success','Rol eliminado');
    	} catch (\Exception $e) {
    		$request->session()->flash('info','No se puede eliminar rol');
    	}
    	return redirect()->route('roles');	
    }

    public function pdf($idRol)
    {
    	$rol=Role::findOrFail($idRol);
    	
    	$pdf = PDF::loadView('seguridades.roles.pdf', ['rol'=>$rol]);
		return $pdf->inline($rol->name.'.pdf');
    }
}
