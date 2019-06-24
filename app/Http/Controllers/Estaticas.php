<?php

namespace ioliga\Http\Controllers;

use Illuminate\Http\Request;
use ioliga\Models\Nosotro;
use ioliga\Models\Noticia;

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
}
