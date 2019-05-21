<?php

namespace ioliga\Http\Requests\Equipo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use ioliga\Models\Equipo\Equipo;
use Illuminate\Support\Facades\Crypt;
class RqActualizarMiEquipo extends FormRequest
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
            'equipo' => 'required',   
            'localidad' => 'required',    
            'anioCreacion'=>'required',
            'telefono'=>'required|digits_between:6,10',
            'color'=>'required|string',
            
        ];
    }
}
