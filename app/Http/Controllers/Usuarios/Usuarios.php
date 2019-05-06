<?php

namespace ioliga\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use ioliga\Http\Controllers\Controller;
use ioliga\User;
use ioliga\DataTables\Usuarios\UsuariosDataTable;
use ioliga\Http\Requests\Usuarios\RqCrear;
use ioliga\Http\Requests\Usuarios\RqActualizar;
use ioliga\Http\Requests\Usuarios\RqActualizarFoto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class Usuarios extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(UsuariosDataTable $dataTable)
    {
    	$this->authorize('view',User::class);
    	return $dataTable->render('usuarios.usuarios.index');
    }

    public function crear()
    {
        $this->authorize('create',User::class);
        $data = array('roles' => Role::where('name','!=','SuperAdministrador')->get() );
    	return view('usuarios.usuarios.crear',$data);
    }

    public function guardar(RqCrear $request)
    {
        $this->authorize('create',User::class);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->nombres=$request->nombres;
        $user->apellidos=$request->apellidos;
        $user->identificacion=$request->identificacion;
        $user->tipoIdentificacion=$request->tipoIdentificacion;
        $user->sexo=$request->sexo;
        $user->telefono=$request->telefono;
        $user->celular=$request->celular;
        $user->detalle=$request->detalle;
        $user->estadoCivil=$request->estadoCivil;

        $rolSuperAdmin=Role::where('name','SuperAdministrador')->first();
        $roles=Role::whereIn('id',$request->roles)->where('id','!=',$rolSuperAdmin->id)->get();
                
        if ($user->save()) {
            if ($request->hasFile('foto')) {
                $foto=$user->id.'_'.Carbon::now().'.'.$request->foto->extension();
                $path = $request->foto->storeAs('usuarios', $foto,'public');
                $user->foto=$foto;    
                $user->save();
            }
        }
        $user->assignRole($roles);

        $request->session()->flash('success','Usuario creado');
        return redirect()->route('usuarios');
    }


    public function editar(Request $request,$idUsuario)
    {
        $this->authorize('update',User::class);
        $user=User::findOrFail($idUsuario);
        $data = array('usuario' => $user,'roles' => Role::where('name','!=','SuperAdministrador')->get() );
        return view('usuarios.usuarios.editar',$data);
    }

    public function actualizar(RqActualizar $request)
    {
        $this->authorize('update',User::class);
        $user=User::findOrFail($request->usuario);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->password){
            $user->password=Hash::make($request->password);
        }
        $user->nombres=$request->nombres;
        $user->apellidos=$request->apellidos;
        $user->identificacion=$request->identificacion;
        $user->tipoIdentificacion=$request->tipoIdentificacion;
        $user->sexo=$request->sexo;
        $user->telefono=$request->telefono;
        $user->celular=$request->celular;
        $user->detalle=$request->detalle;
        $user->fechaNacimiento=$request->fechaNacimiento;
        $user->estadoCivil=$request->estadoCivil;

        $rolSuperAdmin=Role::where('name','SuperAdministrador')->first();
        $roles=Role::whereIn('id',$request->roles)->where('id','!=',$rolSuperAdmin->id)->get();
        $user->save();
        $user->syncRoles($roles);

        $request->session()->flash('success','Usuario actualizado');
        return redirect()->route('usuarios');
    }

    public function editarFoto(Request $request,$idUsuario)
    {
        $this->authorize('update',User::class);
        $usuario=User::findOrFail($idUsuario);
        $data = array('usuario' => $usuario );
        return view('usuarios.usuarios.editarFoto',$data);
    }

    public function actualizarFoto(RqActualizarFoto $request)
    {
        $this->authorize('update',User::class);
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

    public function eliminar(Request $request,$idUsuario)
    {
        $this->authorize('delete',User::class);
        $user=User::findOrFail($idUsuario);
        try {
            if ($user->id=!Auth::id()) {
                $user->delete();
                $request->session()->flash('success','Usuario eliminado');
            }else{
                $request->session()->flash('danger','No puede auto-eliminarse');
            }
            
        } catch (\Exception $e) {
            $request->session()->flash('info','Usuario no eliminado');
        }
        return redirect()->route('usuarios');
    }
}
