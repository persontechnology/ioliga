<?php

namespace ioliga\Http\Requests\Equipo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Equipo\Equipo;
class RqGuardarEquipo extends FormRequest
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
         Validator::extend('existeInfoNombre', function($attribute, $value, $parameters){
            $genero=GeneroEquipo::find($this->input('generoEquipo_id'));
            $validateequipo=Equipo::where('generoEquipo_id',$genero->id)
            ->where('users_id',$this->input('usuario'))  
            ->count();
            if($validateequipo==0){
                return true;
            }else{
                return false;
            }

        },"El representante ya pertenece a otro equipo en esta categoría");
        return [
            'usuario'=>'required|existeInfoNombre',
            'generoEquipo_id'=>'required',
            'nombre'=>'required|unique:equipo,nombre,'.$this->input('generoEquipo_id'),
            'telefono'=>'nullable|digits_between:6,10',
            'colo1'=>'nullable|string',
           
        ];
    }
}
