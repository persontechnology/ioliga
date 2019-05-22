<?php

namespace ioliga\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use ioliga\Models\Nomina\Nomina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use ioliga\User;
use ioliga\Models\Equipo\Equipo;
class Nominas extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    /*mostrar datos para nomina de la lista de jugadores*/
    public function index($codigoEquipo)
    {
        try {        

            if($this->validarExistencia($codigoEquipo)==true){
                $this->authorize('verNominaRepresentante',Nomina::class);
                $nomina = Nomina::where('equipo_id',Crypt::decryptString($codigoEquipo))->get();      	
        		$equipo = Equipo::findOrFail(Crypt::decryptString($codigoEquipo));
                return view('nominas.index',['nomina'=>$nomina,'equipo'=>$equipo]);                
             }
             session()->flash('danger','Error al visualizar: El equipo ingresado no pertenece a su representación !');
            return redirect()->route('mis-equipos');  

        } catch (DecryptException $th) {

            session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
            return redirect()->route('mis-equipos');            
        }
    	
    }

    public function nominaRepresentante()

    {
        $this->authorize('representante',Nomina::class);
        $usuario=User::findOrFail(Auth::id());
        return view('nominas.representante',['usuario'=>$usuario]);
    }

    public function crearJugadorNomina($codigoEquipo)
    {

        try {        

            if($this->validarExistencia($codigoEquipo)==true){
                 $this->authorize('crearJugadorNomina',Nomina::class);
                $equipo = Equipo::findOrFail(Crypt::decryptString($codigoEquipo));        
                return view('nominas.crearJugador',['equipo'=>$equipo]);;                
             }
             session()->flash('danger','Error al visualizar: El equipo ingresado no pertenece a su representación !');
            return redirect()->route('mis-equipos');  

        } catch (DecryptException $th) {

            session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
            return redirect()->route('mis-equipos');            
        }
       
    }

    /*validar si el equipo pertenece al usuario selecionado*/
    public function validarExistencia($codigoEquipo)
    {
        $idEquipo=Crypt::decryptString($codigoEquipo);
        $usuario=User::findOrFail(Auth::id());
        $validarEquipo=Equipo::where('users_id',$usuario->id)
        ->where('id',$idEquipo)->count();
           if($validarEquipo==1){
            return true;
           }else{
            return false;
           }
    }
}
