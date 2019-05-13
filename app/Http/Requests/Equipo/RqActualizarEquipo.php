<?php

namespace ioliga\Http\Requests\Equipo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
        return [
            'users_id' => Rule::unique('users_id')->where(function ($query) {
                    $idequipo=$this->input('equipo');
                    $idusuario=$this->input('usuario');
                    return $query->where('users_id',$idusuario)->where('id','!=',$idequipo);
                }),
            'genero'=>'required',
            'nombre'=>'required|unique:equipo,nombre,'.$this->input('equipo'),
            'telefono'=>'nullable|digits_between:6,10',
            'colo1'=>'nullable|string',
        ];
    }
}
