<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\Models\Campeonato;
use ioliga\User;
use Spatie\Permission\Models\Role;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Equipo\Equipo;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
       $campeonato=Campeonato::orderBy('fechaInicio','desc')->get();
       $equipo=Equipo::orderBy('nombre','asc')->get();
       $genero=GeneroEquipo::get();
       $data = array('campeonatos' =>$campeonato ,'genero'=>$genero,'equipo'=>$equipo );
    
        return view('home',$data);
    }
}
