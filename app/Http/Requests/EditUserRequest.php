<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class EditUserRequest extends FormRequest
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
        (int) $id = $this->request->get('id');

        return [
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'fecha_nacimiento' => 'required|date',
        ];
    }

    public function messages(){
        return[
            'nombres.required' => 'Los nombres son requeridos.',
            'apellido_paterno.required' => 'El apellido paterno es requerido.',
            'apellido_materno.required' => 'El apellido materno es requerido.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es requerida.',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.'
        ];
    }
}
