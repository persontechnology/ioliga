<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\DataTables\CampeonatoDataTable;
use ioliga\Models\Campeonato;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Http\Requests\Campeonatos\RqCrear;
use ioliga\Http\Requests\Campeonatos\RqActualizar;
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
        } catch (\Exception $e) {
            $request->session()->flash('info','Campeonato no creado');
            DB::rollBack();
        }
        return redirect()->route('campeonatos');
    }

    public function actualizar(Request $request,$idCampeonoato)
    {
        $campeonato=Campeonato::findOrFail($idCampeonoato);
        $this->authorize('actualizar',$campeonato);
        
        $ge=GeneroEquipo::has('equipos')->whereNotIn('id',$campeonato->categoriaGenero->pluck('id'))->get();

        $data = array('campeonato' => $campeonato,'generoEquiposNoAsignados'=>$ge);
        return view('campeonatos.actualizar',$data);
    }

    public function editar(RqActualizar $request)
    {
        $campeonato=Campeonato::findOrFail($request->campeonato);
        $this->authorize('actualizar',$campeonato);
        try {
            DB::beginTransaction();
            $campeonato->nombre=$request->nombre;
            $campeonato->fechaInicio=$request->fechaInicio;
            $campeonato->fechaFin=$request->fechaFin;
            $campeonato->descripcion=$request->descripcion;
            $campeonato->usuarioActualizado=Auth::id();
            $campeonato->estado=$request->estado;
            $campeonato->categoriaGenero()->sync($request->generos);
            $campeonato->save();
            DB::commit();
            $request->session()->flash('success','Campeonato actualizado');
            
        } catch (\Exception $e) {
            DB::rollBack();
            $request->session()->flash('info','Campeonato no actualizado, vuelva intentar');
        }
        return redirect()->route('campeonatos');

    }

    public function eliminar(Request $request,$idCampeonoato)
    {
        $campeonato=Campeonato::findOrFail($idCampeonoato);
        $this->authorize('eliminar',$campeonato);
        try {
            $campeonato->delete();
            $request->session()->flash('success','Campeonato eliminado');
        } catch (\Exception $e) {
            $request->session()->flash('info','Campeonato no eliminado, ya que contiene información relacionada');
        }
        return redirect()->route('campeonatos');
    }
}
