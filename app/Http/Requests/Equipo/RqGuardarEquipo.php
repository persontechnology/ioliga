<?php

namespace ioliga\Http\Requests\Equipo;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'users_id'=>'required|unique:equipo,users_id,'.$this->input('users_id'),
            'generoEquipo_id'=>'required',
            'nombre'=>'required|unique:equipo,nombre,'.$this->input('generoEquipo_id'),
            'telefono'=>'nullable|digits_between:6,10',
            'colo1'=>'nullable|string',
           
        ];
    }
}
