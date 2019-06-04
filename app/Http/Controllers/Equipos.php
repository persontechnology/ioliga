<?php

namespace ioliga\Http\Controllers;


use Illuminate\Http\Request;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Equipo\Equipo;
use ioliga\User;
use ioliga\DataTables\EquipoDataTable;
use Illuminate\Support\Facades\Auth;
use ioliga\Http\Requests\Equipo\RqGuardarEquipo;
use ioliga\Http\Requests\Equipo\RqActualizarEquipo;
use ioliga\Http\Requests\Equipo\RqActualizarMiEquipo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use ioliga\Models\Nomina\Nomina;


class Equipos extends Controller
{
    public function __construct(Equipo $estadioModel)
    {
        $this->middleware('auth');
    }
   public function index(EquipoDataTable $dataTable)
    {
        $this->authorize('ver',Equipo::class);
        return $dataTable->render('equipos.index');
        
    }
    public function genero()
    {
        $this->authorize('generoEquipo',GeneroEquipo::class);
        $generos=GeneroEquipo::get();
        return view('equipos.genero',['genero'=>$generos]);
        
    }
    public function equipo(EquipoDataTable $dataTable, $idGenero)
    {
       $this->authorize('ver',Equipo::class);
       $genero=GeneroEquipo::findOrFail($idGenero);
       return $dataTable->with('idGenero',$genero->id)->render('equipos.equipo',['genero'=>$genero]);
        
    }

     public function crear($idGenero)
    {
      $this->authorize('crear',Equipo::class);
      $generos=GeneroEquipo::findOrFail($idGenero);
      $representante=User::role('Representante de equipo')->get();
      return view('equipos.crear',['generos'=>$generos,'representante'=>$representante]);

    }
    
    public function guardar(RqGuardarEquipo $request)
    {
        $this->authorize('crear',Equipo::class);
        $equipo=new Equipo;
        $equipo->nombre=$request->nombre;
        $equipo->resenaHistorico=$request->resenaHistorico;
        $equipo->users_id=$request->usuario;
        $equipo->generoEquipo_id=$request->generoEquipo_id;
        $equipo->localidad=$request->localidad;        
        $equipo->telefono=$request->telefono;
        $equipo->anioCreacion=$request->anioCreacion;
        $equipo->fraseIdentificacion=$request->fraseIdentificacion;
        $equipo->color=$request->color;
         $equipo->color1=$request->color1;
        $equipo->color2=$request->color2;
        $equipo->usuarioCreado=Auth::id();
        if ($equipo->save()) {
            if ($request->hasFile('foto')) {
                $foto=$equipo->id.'_'.Carbon::now().'.'.$request->foto->extension();
                $path = $request->foto->storeAs('equipos', $foto,'public');
                $equipo->foto=$foto;    
                $equipo->save();
            }
        }
        
        $request->session()->flash('success','Nuevo registro creado');
        return redirect()->route('equipos',$request->generoEquipo_id);
    }
       public function estado(Request $request)
    {
         $equipo=Equipo::findOrFail($request->id);
         if($request->estado=="Activo"){
            $equipo->estado=true;
            $equipo->save();
            $request->session()->flash('success','Equipo Activo');      
         }else{
            $equipo->estado=false;
            $equipo->save();
            $request->session()->flash('info','Equipo inactivo');            
         }     
    }

     public function eliminar(Request $request,$idEquipo)
    {
        $equipo=Equipo::findOrFail($idEquipo);
        $this->authorize('eliminar',$equipo);
        try {
            $equipo->delete();
            $request->session()->flash('success','Equipo eliminado');
        } catch (\Exception $e) {
            $request->session()->flash('info','Equipo no eliminado');
        }
        return redirect()->route('equipos',$equipo->generoEquipo_id);
    }
    
     public function editar($CodigoEquipo)
    {
        $equipo = Equipo::find($CodigoEquipo);
        $this->authorize('actualizar',$equipo);
        $representante=User::role('Representante de equipo')->get();               
        $this->authorize('actualizar',$equipo);
        return view('equipos.editar',compact('equipo','representante'));
    }

    
     public function actualizar(RqActualizarEquipo $request)
    {
        
        $equipo=Equipo::findOrFail($request->equipo);  
        $this->authorize('actualizar',$equipo);        
        $equipo->nombre=$request->nombre;
        $equipo->resenaHistorico=$request->resenaHistorico;
        $equipo->users_id=$request->usuario;             
        $equipo->localidad=$request->localidad;        
        $equipo->telefono=$request->telefono;
        $equipo->anioCreacion=$request->anioCreacion;
        $equipo->fraseIdentificacion=$request->fraseIdentificacion;
        $equipo->color=$request->color;
         $equipo->color1=$request->color1;
        $equipo->color2=$request->color2;
        $equipo->usuarioActualizado=Auth::id();
        if($equipo->save()){
            if ($request->hasFile('foto')) {
                if ($request->file('foto')->isValid()) {
                    Storage::disk('public')->delete('equipos/'.$equipo->foto);
                    $foto=$equipo->id.'_'.Carbon::now().'.'.$request->foto->extension();
                    $path = $request->foto->storeAs('equipos', $foto,'public');
                    $equipo->foto=$foto;    
                    $equipo->save();
                }
            }         
        }
        $request->session()->flash('success','equipo editado correctamente');
        return redirect()->route('equipos',$equipo->generoEquipo_id);
    }

    /*funciones para editar los campos de equipo por parte del representante de cada equipo*/
    /*para ello se utilizara los permisos del modelo nominas ya que allio esta la participacion del reperesentante*/
    public function editarMiEquipo($CodigoEquipo)
    {

        try {
            
            $equipo = Equipo::find(Crypt::decryptString($CodigoEquipo));                        
            $this->authorize('actualizarMiEquipo',$equipo);
            return view('equipos.editarMiEquipo',compact('equipo'));

        } catch (DecryptException $th) {
            session()->flash('danger','Error al editar: Los datos ingresados están manipulados vuelva aintentar !');
            return redirect()->route('mis-equipos');            
        }
    }

    public function actualizarMiEquipo(RqActualizarMiEquipo $request)
    {        
        try {
            $equipo=Equipo::findOrFail(Crypt::decryptString($request->equipo));  
            $this->authorize('actualizarMiEquipo',$equipo);   
            $equipo->resenaHistorico=$request->resenaHistorico;                
            $equipo->localidad=$request->localidad;        
            $equipo->telefono=$request->telefono;
            $equipo->anioCreacion=$request->anioCreacion;
            $equipo->fraseIdentificacion=$request->fraseIdentificacion;
            $equipo->color=$request->color;
             $equipo->color1=$request->color1;
            $equipo->color2=$request->color2;
            $equipo->usuarioActualizado=Auth::id();
            if($equipo->save()){
                if ($request->hasFile('foto')) {
                    if ($request->file('foto')->isValid()) {
                        Storage::disk('public')->delete('equipos/'.$equipo->foto);
                        $foto=$equipo->id.'_'.Carbon::now().'.'.$request->foto->extension();
                        $path = $request->foto->storeAs('equipos', $foto,'public');
                        $equipo->foto=$foto;    
                        $equipo->save();
                    }
                }         
            }
            $request->session()->flash('success','Perfil del equipo editado correctamente');
            return redirect()->route('mis-equipos');
        } catch (DecryptException $th) {
            session()->flash('danger','Error al editar: Los datos ingresados están manipulados vuelva aintentar !');
            return redirect()->route('mis-equipos');            
        }
    }

    


}
