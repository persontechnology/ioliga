<?php

namespace ioliga\Http\Controllers\Seguridades;

use Illuminate\Http\Request;
use ioliga\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class Roles extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:SuperAdministrador|Administrador']);
    }	

    public function index()
    {
    	$data = array('roles' => Role::where('name','!=','SuperAdministrador')->get() );
    	return view('seguridades.roles.index',$data);
    }
}
