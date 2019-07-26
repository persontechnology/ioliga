<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\Models\Nosotro;
use ioliga\Models\Noticia;

use Illuminate\Support\Facades\Mail;
use ioliga\Mail\EmailContacto;
use ioliga\Models\Equipo\Equipo;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Campeonato;
use ioliga\Models\Nomina\Nomina;
use Illuminate\Support\Facades\DB;
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
    public function equipoVista($codigoEquipo)
    {
         $equipo=Equipo::findOrFail($codigoEquipo);
         $asignaciones=$equipo->asignaciones;
         $data = array('equipo' =>$equipo );
         return view('estaticas.equipoVista',$data);
    }

  
    public function nominaVista($codigoEquipo)
    {
         $equipo=Equipo::findOrFail($codigoEquipo);
       
         $data = array('equipo' =>$equipo );
         return view('estaticas.nominaVista',$data);
    }

     public function calendarios($codigoCampeo)
    {
        $campeo=Campeonato::findOrFail($codigoCampeo);       
        $data = array('campeo' =>$campeo );
        return view('estaticas.calendarios',$data);
    }
    public function campeonatosVista()
    {
        $campeo=Campeonato::orderBy('estado','desc')
        ->orderBy('fechaInicio','desc')
        ->get();
        $mejorEquipo=Equipo::
          join('asignacion','asignacion.equipo_id','=', 'equipo.id')
          ->join('tabla','tabla.asignacion_id','=', 'asignacion.id')
          ->join('resultado','resultado.tabla_id','=', 'tabla.id')
          ->select('equipo.id',DB::raw('sum(resultado.estado="Ganado") as partidosGanados')) 
          ->groupBy('equipo.id')
          ->orderBy('partidosGanados','desc')
          ->limit(4)  
          ->get();
          $nomina=Nomina::
          join('asignacionNomina','asignacionNomina.nomina_id','=', 'nomina.id')
          ->join('alineacion','alineacion.asignacionNomina_id','=', 'asignacionNomina.id')          
          ->select('nomina.id',DB::raw('sum(alineacion.goles) as golesTotal')) 
          ->groupBy('nomina.id')
          ->orderBy('golesTotal','desc')
          ->limit(4)  
          ->get();
        $data = array('campeo' =>$campeo, 'mejorEquipo'=>$mejorEquipo,'mejorJugador'=>$nomina );
        return view('estaticas.campeonatosVista',$data);
        
    }
    public function tablaVista($codigoCampeo)
    {
        $campeo=Campeonato::findOrFail($codigoCampeo);       
        $data = array('campeo' =>$campeo );
        return view('estaticas.tablaVista',$data);
    }

    public function ayuda()
    {
        return view('estaticas.ayuda');
    }
}
