<?php

namespace ioliga\Http\Requests\Campeonatos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use ioliga\Models\Campeonato;
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
         Validator::extend('existeCampeonato', function($attribute, $value, $parameters){
            $checkCampeonato = Campeonato::where('estado',true)->first();
            if ($checkCampeonato) {
                return false;
            }else{
                return true;
            }
        },"No se puede crear campeonato, ya que existe uno en estado activo!");

        return [
            'nombre'=>'required|string|max:255|existeCampeonato|unique:campeonato,nombre',
            'fechaInicio'=>'required|date',
            'fechaFin'=>'required|date',
            'descripcion'=>'nullable|max:255',
            "generos"    => "required|array",
            "generos.*"  => "required|exists:generoEquipo,id",
        ];
    }
}
