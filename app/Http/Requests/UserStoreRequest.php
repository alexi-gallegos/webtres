<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'rut' => 'required|unique:users|min:8',
            'email' => 'required|email',
            'fecha_nacimiento' => 'required|date',
            'password' => 'required|min:6',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
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
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'password.required' => 'Una contraseña es requerida.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'imagen.required' => 'Una imagen es requerida.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser formato jpeg, png, jpg o svg.',
            'imagen.max' => 'La imagen no puede pesar sobre 2mb.'
        ];
    }
}
