<?php

namespace ioliga\Http\Requests\Campeonatos;

use Illuminate\Foundation\Http\FormRequest;

class RqActualizar extends FormRequest
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
            'nombre'=>'required|string|max:255|unique:campeonato,nombre,'.$this->input('campeonato'),
            'fechaInicio'=>'required|date',
            'fechaFin'=>'required|date',
            'descripcion'=>'nullable|max:255',
            "generos"    => "required|array|min:1",
            "generos.*"  => "required|exists:generoEquipo,id",
            "estado"=>'required|in:1,0'
        ];
    }
}
