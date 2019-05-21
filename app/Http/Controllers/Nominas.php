<?php

namespace ioliga\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use ioliga\Models\Nomina\Nomina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use ioliga\User;
class Nominas extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($codigoEquipo)
    {
    	
		return view('nominas.index');
    	
    }
    public function nominaRepresentante()

    {
        $this->authorize('representante',Nomina::class);
        $usuario=User::findOrFail(Auth::id())
;        return view('nominas.representante',['usuario'=>$usuario]);
    }
}
