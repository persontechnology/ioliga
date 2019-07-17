<?php

namespace ioliga\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use ioliga\Models\Nomina\Nomina;
use ioliga\Models\Campeonato\AsignacionNomina;
use ioliga\Models\Campeonato\Alineacion;
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
use ioliga\Models\Campeonato;
use Illuminate\Support\Collection;
use \PDF;
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
    /*funciones en caso de tener permisos para los demas roles */
    public function listadoNomina($codigoEquipo)
    {
        $equipo = Equipo::findOrFail($codigoEquipo);
        $this->authorize('verListadoNomina',Nomina::class);        
        $nomina = $equipo->nominas;            
        return view('nominas.listaNomina',['nomina'=>$nomina,'equipo'=>$equipo]); 

    }
     public function crearJugador($codigoEquipo)
    {
        $equipo = Equipo::findOrFail($codigoEquipo);
        $this->authorize('crearJugadorEquipo',Nomina::class);                
        return view('nominas.crearJugadorEquipo',['equipo'=>$equipo]);      
    }

    public function guardarJugadorEquipo(RqCrearJugador $request)
    {
        try { 
      
                $this->authorize('crearJugadorEquipo',Nomina::class);  
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
                return redirect()->route('listado-jugadores-nomina',Crypt::decryptString($request->equipo));
       
          } catch (DecryptException $th) {

            session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
            return redirect()->route('listado-jugadores-nomina',Crypt::decryptString($request->equipo));           
        }
    }

    public function actualizarFotoJugadorEquipo($codigoUsuario)
    {       
        $usuario=User::findOrFail($codigoUsuario);
        $this->authorize('actualizarFotoJugador',Nomina::class);
        $data = array('usuario' => $usuario );
        return view('nominas.editarFotoJugador',$data);        
    }

    public function editarFotoJugadorEquipo(RqActualizarFoto $request)
    {
        $user=User::findOrFail($request->id);
      
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
    
    public function vistaPreviaJugador($codigousuario)
    {     
        $this->authorize('representante',Nomina::class);
        $nomina=Nomina::findOrFail($codigousuario);
        $equipos=Equipo::where('estado',1)->orderby('generoEquipo_id')->get();
        $equipo=$equipos->whereNotIn('id',$nomina->equipoUno->id);
        /*Verificarl si la nomina no esta en uso en una asignacion con campeonato en estado true*/
        $existenteActivo=$this->validarNominaActivo($nomina->id);    
        if($existenteActivo){
            $asignacionNomia=AsignacionNomina::findOrFail($existenteActivo[0]);
            $data = array('nomina' =>$nomina ,'equipo'=>$equipo,'nominaExistente'=>$asignacionNomia );
        return view('nominas.vistaJugador',$data);            
        }
          $data = array('nomina' =>$nomina ,'equipo'=>$equipo,'nominaExistente'=>'' );
        return view('nominas.vistaJugador',$data);       
    }

    public function validarNominaActivo($nomina)
    {
        $totalCampeonatos= '';
        $campeonatosActivos=Campeonato::where('estado',1)->get();
        if($campeonatosActivos->count()>0){
           $primerCampeonato=Campeonato::where('estado',1)->first();
            $totalCampeonatos1=$primerCampeonato->generoSerie;
           foreach ($totalCampeonatos1 as $genero) {
                  foreach ($genero->serieAsignacionNomina as $asi) {                    
                      if($nomina==$asi->nomina_id){
                        $totalCampeonatos=collect($asi->id);
                      }
                  }
            } 
           
        }else{
            $totalCampeonatos= '';
        }
        return $totalCampeonatos;
    }

    public function acutualizaJugadorEquipo(Request $request)
    {
        try { 
             $nomina=Nomina::findOrFail(Crypt::decryptString($request->nomina));
             $nomina->equipo_id=Crypt::decryptString($request->equipo);
             $nomina->save();
             session()->flash('success','Pase realizado Exitosamente !');
            return redirect()->route('listado-jugadores-nomina',Crypt::decryptString($request->equipo));
         } catch (DecryptException $th) {

            session()->flash('danger','Error al visualizar: Los datos ingresados están manipulados vuelva intentar !');
            return redirect()->route('listado-jugadores-nomina',Crypt::decryptString($request->equipo));           
        }
        
    }

    public function editarJugador($codigoUsuario)
    {
        $user=User::findOrFail($codigoUsuario);
        $this->authorize('actualizar',$user);
        $data = array('usuario' => $user,'roles' => Role::where('name','!=','SuperAdministrador')->get() );
        return view('nominas.editarJugador',$data);
    }

    public function multaJugadores($Codigocampeo)
    {
         $this->authorize('Multas jugador',Nomina::class);
          $campeonato=Campeonato::findOrFail($Codigocampeo);
          $data = array('campeonato' =>$campeonato , );
          return view('nominas.multasJugadores',$data); 
    }
    public function cobrarMulta($codigoAli,$codigoCam)
    {
         $this->authorize('Cobrar multa',Nomina::class);
          $alineacion=Alineacion::findOrFail($codigoAli);
          $alineacion->estadoSale=true;
            $alineacion->usuarioActualizado=Auth::id();
            $alineacion->save();
       session()->flash('success','Cobro realizado exitosamente');
        return redirect()->route('multas-jugadores',$codigoCam);
    }

      public function reportesMulta($Codigocampeo)
    {
         $this->authorize('Multas jugador',Nomina::class);
          $campeonato=Campeonato::findOrFail($Codigocampeo);
          $data = array('campeonato' =>$campeonato , );
          /*return view('nominas.reporteMultas',$data);*/
        $pdf = PDF::loadView('nominas.reporteMultas',$data);
        return $pdf->download('multas_de_'.$campeonato->fechaInicio.'.pdf');
      
    }
       public function reportesNomina($idEquipo)
    {
          $equipo=Equipo::findOrFail($idEquipo);
          $nomina=$equipo->nominas;
          $data = array('equipo' =>$equipo ,'nomina' =>$nomina , );
         /* return view('nominas.reporteNominas',$data);*/
        $pdf = PDF::loadView('nominas.reporteNominas',$data);
        return $pdf->download('Nomina'.$equipo->nombre.'.pdf');
      
    }

}
