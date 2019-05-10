<?php

namespace ioliga\Http\Controllers;


use Illuminate\Http\Request;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Equipo\Equipo;
use ioliga\User;
use ioliga\DataTables\EquipoDataTable;
use Illuminate\Support\Facades\Auth;
use ioliga\Http\Requests\Equipo\RqGuardarEquipo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Equipos extends Controller
{
    public function __construct(Equipo $estadioModel)
    {
        $this->middleware('auth');
    }
   public function index(EquipoDataTable $dataTable)
    {
        /*$this->authorize('ver',Estadio::class);*/
        return $dataTable->render('equipos.index');
        
    }
    public function genero()
    {
        /*$this->authorize('ver',Estadio::class);*/
        $generos=GeneroEquipo::get();
        return view('equipos.genero',['genero'=>$generos]);
        
    }
    public function equipo(EquipoDataTable $dataTable, $idGenero)
    {
        /*$this->authorize('ver',Estadio::class);*/
        $genero=GeneroEquipo::findOrFail($idGenero);

        return $dataTable->with('idGenero',$genero->id)->render('equipos.equipo',['genero'=>$genero]);
        
    }

     public function crear($idGenero)
    {
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
        $equipo->users_id=$request->users_id;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
