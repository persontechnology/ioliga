<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\DataTables\CampeonatoDataTable;
use ioliga\Models\Campeonato;
class Campeonatos extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(CampeonatoDataTable $dataTable)
    {
        $this->authorize('ver',Campeonato::class);
        return $dataTable->render('campeonatos.index');
    }

    public function crear()
    {
        $this->authorize('crear',Estadio::class);
        return view('campeonatos.crear');
    }
}