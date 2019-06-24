<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\DataTables\NoticiasDataTable;
use ioliga\Models\Noticia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Noticias extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth']);
        
    }

    public function index(NoticiasDataTable $datatable)
    {
        $this->authorize('administrarNoticias',Noticia::class);
        return $datatable->render('noticias.index');
    }

    public function nuevo()
    {
        $this->authorize('administrarNoticias',Noticia::class);
        return view('noticias.nuevo');
    }

    public function guardar(Request $request)
    {
        $this->authorize('administrarNoticias',Noticia::class);
        $request->validate([
            'titulo' => 'required|string|max:255',
            'detalle' => 'required',
            'foto'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'urlvideo'=>'nullable|string|max:255'
        ]);
        $n=new Noticia;
        $n->titulo=$request->titulo;
        $n->detalle=$request->detalle;
        $n->estado=false;
        if($request->urlvideo){
            $n->urlVideo=$request->urlvideo;
        }
        $n->vistas=0;
        $foto=$n->id.'_'.Carbon::now().'.'.$request->foto->extension();
        $path = $request->foto->storeAs('noticias', $foto,'public');
        $n->foto=$foto; 

        $n->save();

      
        
        $request->session()->flash('success','Noticia ingresado exitosamente');
        return redirect()->route('noticiasAdmin');
    }

    public function estado(Request $request,$idNot)
    {
        $this->authorize('administrarNoticias',Noticia::class);
        $no=Noticia::findOrFail($idNot);
        if($no->estado){
            $no->estado=false;
            $request->session()->flash('info','Noticia cambiado a Sin publicar');
        }else{
            $no->estado=true;
            $request->session()->flash('success','Noticia cambiado a publicar');
        }
        $no->save();
        return redirect()->route('noticiasAdmin');
    }

    

    public function editar($idNot)
    {
        $this->authorize('administrarNoticias',Noticia::class);
        $no=Noticia::findOrFail($idNot);
        $data = array('n'=>$no );
        return view('noticias.editar',$data);
    }

    public function actualizar(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'titulo' => 'required|string|max:255',
            'detalle' => 'required',
            'foto'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'urlvideo'=>'nullable|string|max:255'
        ]);
        $n=Noticia::findOrFail($request->id);
        $n->titulo=$request->titulo;
        $n->detalle=$request->detalle;

        if($request->urlvideo){
            $n->urlVideo=$request->urlvideo;
        }else{
            $n->urlVideo=null;
        }


        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete('noticias/'.$n->foto);
            $foto=$n->id.'_'.Carbon::now().'.'.$request->foto->extension();
            $request->foto->storeAs('noticias', $foto,'public');
            $n->foto=$foto; 
        }

        $n->save();

      
        
        $request->session()->flash('success','Noticia actualizado exitosamente');
        return redirect()->route('noticiasAdmin');
    }


    public function eliminar(Request $request,$idNot)
    {
        $no=Noticia::findOrFail($idNot);
        try {
            $no->delete();
            $request->session()->flash('success','Noticia eliminado');
            Storage::disk('public')->delete('noticias/'.$no->foto);
        } catch (\Exception $th) {
            $request->session()->flash('info','Noticia no eliminado');
        }
        return redirect()->route('noticiasAdmin');
    }
}
