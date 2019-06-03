<?php

namespace ioliga\Http\Requests\Campeonatos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Crypt;
use ioliga\Models\Campeonato\AsignacionNomina;

class RqCrearAsignacionNomina extends FormRequest
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
        Validator::extend('existeInfoNumero', function($attribute, $value, $parameters){
            $asignacion=Crypt::decryptString($this->input('asignacion'));
            $validateequipo=AsignacionNomina::where('asignacion_id',$asignacion)
            ->where('numero',$this->input('numero'))  
            ->count();
            if($validateequipo==0){
                return true;
            }else{
                return false;
            }

        },"El número de camiseta ya existe en esta asignación");
         return [
            'jugador'=>'required',
            'asignacion'=>'required',
            'numero'=>'required|digits_between:1,2|existeInfoNumero',           
        ];
    }
}
