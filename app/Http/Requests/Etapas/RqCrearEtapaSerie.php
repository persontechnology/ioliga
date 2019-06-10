<?php

namespace ioliga\Http\Requests\Etapas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use ioliga\Models\Campeonato\Etapa;
use ioliga\Models\Campeonato\GeneroSerie;
use ioliga\Models\Campeonato\EtapaSerie;
class RqCrearEtapaSerie extends FormRequest
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
        Validator::extend('existeInfo', function($attribute, $value, $parameters){       
            $validateetapaSerie=EtapaSerie::where('generoSerie_id',$this->input('generoSerie'))
            ->where('etapa_id',$this->input('etapa'))          
            ->first();
            if($validateetapaSerie){
                return false;
            }else{
                return true;
            }

        },"La  etapa ya esta asignada a esta serie");

        return [
            'etapa'=>'required|existeInfo'
        ];
    }
}
