<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\Models\Campeonato;
use ioliga\User;
use Spatie\Permission\Models\Role;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Equipo\Equipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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
     public function perfil()
    {
        return view('auth.perfil');
    }

    public function perfilActualizar(Request $request)
    {
         $request->validate([
            
            'nombres'=>'required|string|max:255',
            'apellidos'=>'required|string|max:255',
            'telefono'=>'required|numeric|digits_between:6,10',
                      
            'sexo'=>'required',           
            'name'=>'required|string|max:255'
        ]);
        $user=Auth::user();     
        $user->name = $request->name;
        $user->nombres=$request->nombres;
        $user->apellidos=$request->apellidos;
        $user->telefono=$request->telefono;      
        $user->sexo=$request->sexo;
        $user->fechaNacimiento=$request->fechaNacimiento;
          if ($request->hasFile('foto')) {
            Storage::disk('public')->delete('usuarios/'.$user->foto);
            $foto=$user->id.'_'.Carbon::now().'.'.$request->foto->extension();
            $request->foto->storeAs('usuarios', $foto,'public');
            $user->foto=$foto; 
        }
        $user->save();
        $request->session()->flash('success','Perfil actualizado exitosamente.');
        return redirect()->route('miPerfil'); 
    }

    public function perfilActualizarPasswor(Request $request)
    {
        $request->validate([
            'passwordAntiguo'=>'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if(Hash::check($request->passwordAntiguo, Auth::user()->password)) {
            $request->user()->fill(['password' => Hash::make($request->password)])->save();
            $request->session()->flash('success', 'Password actualizado exitosamente.');
        }
        else {
            $request->session()->flash('errorPassworAntiguo', 'Password antiguo incorrecto.');

        }
        return redirect()->route('miPerfil'); 
    }
    
}
