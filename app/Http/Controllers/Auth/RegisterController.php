<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        \Log::info('Iniciando el proceso de registro.');

        // Validar los datos
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            \Log::info('La validación ha fallado.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Hubo errores en el formulario. Por favor, revisa los campos.');
        }

        \Log::info('Validación exitosa. Creando usuario.');

        // Crear el usuario
        $user = $this->create($request->all());

        // Autenticar al usuario recién registrado
        Auth::login($user);

        \Log::info('Usuario autenticado exitosamente. Redirigiendo.');

        // Redirigir con mensaje de éxito al dashboard o página de inicio
        return redirect()->route('index')->with('success', '¡Registro exitoso! Bienvenido.');
    }

    /**
     * Valida los datos del formulario de registro.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
{
    return Validator::make($data, [
        'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ], [
        'email.required' => 'El campo de correo electrónico es obligatorio.',
        'email.email' => 'Por favor, ingrese un correo electrónico válido.',
        'email.unique' => 'Este correo electrónico ya está registrado.',
        'password.required' => 'El campo de contraseña es obligatorio.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'password.confirmed' => 'Las contraseñas no coinciden. Por favor, inténtalo de nuevo.',
    ]);
}


    protected function create(array $data)
    {
        return User::create([
            'nick' => $data['email'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'rol' => 1,
            'estado' => 'activo',  // Estado inicial
        ]);
    }
}
