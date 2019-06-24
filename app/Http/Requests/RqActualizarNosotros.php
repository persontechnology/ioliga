<?php

namespace ioliga\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RqActualizarNosotros extends FormRequest
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
            'nombre'=>'required|string|max:255',
            'resena'=>'nullable|string',
            'presidente'=>'nullable|string|max:255',
            'vocala'=>'nullable|string|max:255',
            'vocalb'=>'nullable|string|max:255',
            'numeroJugadoresNomina'=>'nullable|integer|min:0',
            'numeroJugadoresEncuentro'=>'nullable|integer|min:0',
            'facebook'=>'nullable|string|max:255',
            'twitter'=>'nullable|string|max:255',
            'youtube'=>'nullable|string|max:255',
            'istagram'=>'nullable|string|max:255',
            'logo'=>'nullable|mimes:jpeg,jpg,png|max:1000',
            'acerca'=>'nullable|string',
            'mision'=>'nullable|string',
            'vision'=>'nullable|string',
            'email'=>'nullable|string|email|max:255',
            'telefono'=>'nullable|string|max:25',
        ];
    }
}
