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
            'rut' => ['required','min:8', Rule::unique('users')->ignore($id)],
            'email' => 'required|email',
            'fecha_nacimiento' => 'required|date',
        ];
    }

    public function messages(){
        return[
            'nombres.required' => 'Los nombres son requeridos.',
            'apellido_paterno.required' => 'El apellido paterno es requerido.',
            'apellido_materno.required' => 'El apellido materno es requerido.',
            'rut.required' => 'El RUT es requerido.',
            'rut.min' => 'El campo RUT debe tener al menos 8 caracteres.',
            'rut.unique' => 'Este RUT ya está registrado en el sistema.',
            'email.required' => 'El email es requerido.',
            'email.email' => 'Debe ingresar un Email válido.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es requerida.',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.'
        ];
    }
}
