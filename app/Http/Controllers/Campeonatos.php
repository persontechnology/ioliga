<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\DataTables\CampeonatoDataTable;
use ioliga\Models\Campeonato;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Http\Requests\Campeonatos\RqCrear;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ioliga\Models\Equipo\Genero;

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

        $generoEquipos=GeneroEquipo::has('equipos')->get();

        $data = array('generoEquipos' => $generoEquipos );

        return view('campeonatos.crear',$data);
    }

    public function guardar(RqCrear $request)
    {
        $this->authorize('crear',Estadio::class);

        try {
            DB::beginTransaction();

            $campeonato=new Campeonato;
            $campeonato->nombre=$request->nombre;
            $campeonato->fechaInicio=$request->fechaInicio;
            $campeonato->fechaFin=$request->fechaFin;
            $campeonato->descripcion=$request->descripcion;
            $campeonato->usuarioCreado=Auth::id();
            $campeonato->save();

            foreach ($request->generos as $generoEquipo) {
                $gne=new Genero;
                $gne->campeonato_id=$campeonato->id;
                $gne->generoEquipo_id=$generoEquipo;
                $gne->save();
            }

            DB::commit();
            $request->session()->flash('success','Campeonato creado');
            return redirect()->route('campeonatos');
        } catch (\Exception $e) {
            $request->session()->flash('info','Campeonato no creado');
            DB::rollBack();
        }
    }
}
