<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\Models\Estadio;
use ioliga\DataTables\EstadioDataTable;

class Estadios extends Controller
{
    public function index(EstadioDataTable $dataTable)
    {
    	 return $dataTable->render('estadios.index');
    }
}
