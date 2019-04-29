<?php

namespace ioliga\Http\Requests\Estadio;

use Illuminate\Foundation\Http\FormRequest;

class RqGuardarEstadio extends FormRequest
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
            'nombre'=>'required|string|max:255|unique:estadio',
            'direccion'=>'required|string|max:255',
            'telefono'=>'nullable|digits_between:6,10',
            'foto'=>'nullable|mimes:jpeg,png,jpg,svg|max:10240'
        ];
    }
}
