<?php

namespace ioliga\Http\Requests\Equipo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use ioliga\Models\Equipo\Equipo;

class RqActualizarEquipo extends FormRequest
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
    //select from equipo 
    public function rules()
    {
        

    Validator::extend('existeInfo', function($attribute, $value, $parameters){
            $equipo=Equipo::find($this->input('equipo'));
            $validateequipo=Equipo::where('id','!=',$this->input('equipo'))
            ->where('users_id',$this->input('usuario'))
            ->where('generoEquipo_id',$equipo->generoEquipo_id)
            ->first();
            if($validateequipo){
                return false;
            }else{
                return true;
            }

        },"El representante ya pertenece a otro equipo en esta categoría");

        return [
            'equipo' => 'required',
            'usuario' =>'existeInfo',
            'genero'=>'required',
            'nombre'=>'required|unique:equipo,nombre,'.$this->input('equipo'),
            'telefono'=>'nullable|digits_between:6,10',
            'colo1'=>'nullable|string',
        ];
    }
}
