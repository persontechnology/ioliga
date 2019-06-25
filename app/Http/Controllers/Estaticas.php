<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\Models\Nosotro;
use ioliga\Models\Noticia;

use Illuminate\Support\Facades\Mail;
use ioliga\Mail\EmailContacto;
use ioliga\Models\Equipo\Equipo;
use ioliga\Models\Equipo\GeneroEquipo;

class Estaticas extends Controller
{
    public function nosotros()
    {
        $nos=Nosotro::first();
        return view('estaticas.nosotros',['nos'=>$nos]);
    }

    public function noticias()
    {
        $no=Noticia::where('estado',true)->paginate(12);
        return view('estaticas.noticias',['no'=>$no]);
    }
    public function noticiaDetalle($id)
    {
        $n=Noticia::findOrFail($id);
        if($n->estado){
            $n->vistas=$n->vistas+1;
            $n->save();
            $no=Noticia::where('estado',true)->where('id','!=',$id)->get();
            $data = array('n' =>$n ,'no'=> $no);
            return view('estaticas.noticiaDetalle',$data);
        }
        return abort(404);
        
    }



    public function contactos()
    {
        return view('estaticas.contactos');
    }

    public function contactosGuardar(Request $r)
    {
        $data = array('email' => $r->email,'nombre'=>$r->nombre,'asunto'=>$r->asunto,'mensaje'=>$r->mensaje );
    	Mail::to(config('MAIL_FROM_ADDRESS','carlosquishpe001@gmail.com'))->send(new EmailContacto($data));
    	$r->session()->flash('success','Liga te da la bienvenida y gracias por escribirnos. Intentaremos responderte lo antes posible.');
    	return redirect()->route('contactos');
    }
    

    public function eqiposVista()
    {
        $genero=GeneroEquipo::get();
        $data = array('genero' =>$genero );
         return view('estaticas.equiposVista',$data);
    }
}
