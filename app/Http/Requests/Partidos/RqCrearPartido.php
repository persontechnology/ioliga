<?php

namespace ioliga\Http\Requests\Partidos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use ioliga\Models\Campeonato\Fecha;
use ioliga\Models\Estadio;
use ioliga\Models\Campeonato\Partido;
class RqCrearPartido extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        Validator::extend('existeInfoEquipo2', function($attribute, $value, $parameters){
            $fecha=Fecha::findOrFail($this->input('fecha'));
             $asignacioncionAsc=$fecha->etapaSerie->buscarPartidoRepetidos()
           ->whereIn('asignacion1_id',[$this->input('primerequipo')])
           ->whereIn('asignacion2_id',[$this->input('segundoequipo')])->get(); 
           $asignacioncionDesc=$fecha->etapaSerie->buscarPartidoRepetidos()
           ->whereIn('asignacion1_id',[$this->input('segundoequipo')])
           ->whereIn('asignacion2_id',[$this->input('primerequipo')])->get();         
            
            if($asignacioncionAsc->count()==0 && $asignacioncionDesc->count()==0 ){
                return true;
            }else{
                return false;
            }

        },"El primer equipo ya tiene un partito con el segundo equipo en esta temporada");
        return [
            'fecha'=>'required',
            'primerequipo'=>'required|existeInfoEquipo2',
            'segundoequipo'=>'required|different:primerequipo',
            'hora'=>'required',
        ];
    }
}
