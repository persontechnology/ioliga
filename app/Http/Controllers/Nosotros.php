<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\Models\Nosotro;
use ioliga\Http\Requests\RqActualizarNosotros;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class Nosotros extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:SuperAdministrador|Administrador']);
    }	

    public function index()
    {
        $no=Nosotro::first();
        return view('nosotros.index',['no'=>$no]);
    }

    public function actualizarNosotrosAdmin(RqActualizarNosotros $request)
    {
        $no=Nosotro::first();
        if(!$no){
            $no=new Nosotro();
        }
        $no->nombre=$request->nombre;
        $no->resena=$request->resena;
        $no->presidente=$request->presidente;
        $no->vocala=$request->vocala;
        $no->vocalb=$request->vocalb;
        $no->numeroJugadoresNomina=$request->numeroJugadoresNomina;
        $no->numeroJugadoresEncuentro=$request->numeroJugadoresEncuentro;
        $no->facebook=$request->facebook;
        $no->twitter=$request->twitter;
        $no->youtube=$request->youtube;
        $no->istagram=$request->istagram;
        
        $no->acerca=$request->acerca;
        $no->mision=$request->mision;
        $no->vision=$request->vision;
        $no->email=$request->email;
        $no->telefono=$request->telefono;
        
        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete('nosotros/'.$no->logo);
            $foto=$no->id.'_'.Carbon::now().'.'.$request->logo->extension();
            $request->logo->storeAs('nosotros', $foto,'public');
            $no->logo=$foto; 
        }

        $no->save();
        $request->session()->flash('success','Información de la liga actualizado');
        return redirect()->route('nosotrosAdmin');
    }
}
