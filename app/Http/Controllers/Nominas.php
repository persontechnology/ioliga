<?php

namespace ioliga\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use ioliga\Models\Nomina\Nomina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use ioliga\User;
use ioliga\Models\Equipo\Equipo;
use ioliga\Http\Requests\Usuarios\RqCrearJugador;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use ioliga\Http\Requests\Usuarios\RqActualizarFoto;

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
                
            $equipo = Equipo::findOrFail(Crypt::decryptString($codigoEquipo));
            $this->authorize('verNominaRepresentante',$equipo);
            $nomina = $equipo->nominas;
            $numeroActivos = $nomina->where('estado',true)->count();
            $numeroInactivos = $nomina->where('estado',false)->count();        		
            return view('nominas.index',['nomina'=>$nomina,'equipo'=>$equipo,'conteoEstado'=>$numeroActivos,'conteoInactivos'=>$numeroInactivos]); 

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

             $equipo = Equipo::findOrFail(Crypt::decryptString($codigoEquipo));
            $this->authorize('crearJugadorNomina',$equipo);                
            return view('nominas.crearJugador',['equipo'=>$equipo]);            

        } catch (DecryptException $th) {

            session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
            return redirect()->route('mis-equipos');            
        }
       
    }

     public function guardarJugador(RqCrearJugador $request)
    {
        try { 
            if($this->validarExistencia($request->equipo)==true){   
            
                $user=new User;
                $user->name=$request->name;
                $user->email=$request->email;
                $user->password=Hash::make($request->identificacion);
                $user->nombres=$request->nombres;
                $user->apellidos=$request->apellidos;
                $user->identificacion=$request->identificacion;
                $user->tipoIdentificacion=$request->tipoIdentificacion;
                $user->sexo=$request->sexo;
                $user->telefono=$request->telefono;
                $user->celular=$request->celular;
                $user->detalle=$request->detalle;
                $user->estado=true;
                $user->fechaNacimiento=$request->fechaNacimiento;
                $user->estadoCivil=$request->estadoCivil;
                $roles=Role::where('name','Jugador')->get();

                if ($user->save()) {
                    if ($request->hasFile('foto')) {
                        $foto=$user->id.'_'.Carbon::now().'.'.$request->foto->extension();
                        $path = $request->foto->storeAs('usuarios', $foto,'public');
                        $user->foto=$foto;    
                        $user->save();
                    }
                }
                $user->assignRole($roles);
                $nomina=new Nomina;
                $nomina->users_id=$user->id;
                $nomina->equipo_id=Crypt::decryptString($request->equipo);
                $nomina->nacionalidad=$request->nacionalidad;
                $nomina->nacionalidad=$request->lugarProcedencia;
                $nomina->usuarioCreado=Auth::id();
                $nomina->save();
                $request->session()->flash('success','Jugador creado Exitosamente');
                return redirect()->route('nomina',$request->equipo);
            }
                 session()->flash('danger','Error al visualizar: El equipo ingresado no pertenece a su representación !');
                return redirect()->route('mis-equipos');  
          } catch (DecryptException $th) {

            session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
            return redirect()->route('mis-equipos');            
        }
    }

    public function editarFoto($codigoUsuario)
    {
        try { 
                $usuario=User::findOrFail(Crypt::decryptString($codigoUsuario));
                $this->authorize('actualizarImagenJugador',$usuario->nominaUno);
                $data = array('usuario' => $usuario );
                return view('nominas.editarFoto',$data);
            } catch (DecryptException $th) {

            session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
            return redirect()->route('mis-equipos');            
        }
    }
    public function actualizarFoto(RqActualizarFoto $request)
    {
        $user=User::findOrFail(Crypt::decryptString($request->id));
        /*$this->authorize('actualizarImagenJugador',$usuario->nominaUno);*/
         if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                Storage::disk('public')->delete('usuarios/'.$user->foto);
                $foto=$user->id.'_'.Carbon::now().'.'.$request->foto->extension();
                $path = $request->foto->storeAs('usuarios', $foto,'public');
                $user->foto=$foto;    
                $user->save();
            }else{
                return response()->json(['error'=>'No se puede subir una imágen pesada']);
            }
            
        }else{
            return response()->json(['error'=>'No se puede subir una imágen pesada']);
        }
        return response()->json(['link'=>Storage::url('public/usuarios/'.$user->foto)]);
    }

    public function inactivo(Request $request)
    {
         try { 
            $nomina=Nomina::findOrFail(Crypt::decryptString($request->id));
     
            $nomina->estado=false;
            $nomina->detalle=$request->detalle;
            $nomina->usuarioActualizado=Auth::id();
            $nomina->save();
            $request->session()->flash('info','Jugador inactivo del equipo');
           } catch (DecryptException $th) {

            session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
            return redirect()->route('mis-equipos');            
        }
    }


    public function activo(Request $request)
    {
         try { 
            $nomina=Nomina::findOrFail(Crypt::decryptString($request->id));      
            $nomina->estado=true;
            $nomina->detalle=" ";
            $nomina->usuarioActualizado=Auth::id();
            $nomina->save();
            $request->session()->flash('success','Jugador activado Exitosamente');
           } catch (DecryptException $th) {

            session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
            return redirect()->route('mis-equipos');            
        }
    }

    public function vistaPrevia($codigousuario)
    {
         try { 
                $nomina=Nomina::findOrFail(Crypt::decryptString($codigousuario));
                $this->authorize('representante',Nomina::class);
                $data = array('nomina' =>$nomina , );
                return view('nominas.vistaPreviaJugador',$data);
         } catch (DecryptException $th) {

            session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
            return redirect()->route('mis-equipos');            
        }
       
    }
}
