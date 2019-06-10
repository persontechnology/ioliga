<?php

namespace ioliga\Http\Requests\Fechas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use ioliga\Models\Campeonato\Fecha;

class RqCrear extends FormRequest
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
        Validator::extend('existeInfoFecha', function($attribute, $value, $parameters){           
            $validatefecha=Fecha::where('etapaSerie_id',$this->input('etapa'))
            ->where('fechaInicio',$this->input('fecha'))  
            ->count();
            if($validatefecha==0){
                return true;
            }else{
                return false;
            }

        },"La fecha seleccionada ya pertece a esta etapa");
        return [
            'fecha'=>'required|existeInfoFecha',
            'etapa'=>'required',
        ];
    }
}
