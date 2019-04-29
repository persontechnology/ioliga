<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\Models\Estadio;
use ioliga\DataTables\EstadioDataTable;
use Illuminate\Support\Facades\Auth;
use ioliga\User;
use Spatie\Permission\Models\Permission;
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
    
}
