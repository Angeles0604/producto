<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    // Redirige al usuario a Facebook para iniciar sesión
    public function loginFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Callback de Facebook después de la autenticación
    // Maneja la respuesta de Facebook después de que el usuario se loguea
    public function loginFacebookCallback()
    {
        try {
            // Obtener los datos del usuario de Facebook
            $facebookUser = Socialite::driver('facebook')->user();

            // Verificar si el usuario ya existe
            $existingUser = User::where('email', $facebookUser->getEmail())->first();

            if (!$existingUser) {
                // Si el usuario no existe, crear uno nuevo
                $existingUser = User::create([
                    'nick' => $facebookUser->getName(),
                    'email' => $facebookUser->getEmail(),
                    'id_role' => 1,  // Asigna el rol según tu lógica
                    'profile_image' => $facebookUser->getAvatar(),
                ]);
            }

            // Autenticar al usuario
            Auth::login($existingUser);

            // Redirigir a la página principal
            return redirect()->intended('/')->with('success', '¡Inicio de sesión exitoso!');

        } catch (\Exception $e) {
            // En caso de error, redirigir al login con un mensaje de error
            return redirect()->route('login')->withErrors(['error' => 'Error al iniciar sesión con Facebook: ' . $e->getMessage()]);
        }
    }

    // Redirige al usuario a Google para iniciar sesión
    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback de Google después de la autenticación
    // Maneja la respuesta de Google después de que el usuario se loguea
    public function loginGoogleCallback()
    {
        try {
            // Obtener los datos del usuario de Google
            $googleUser = Socialite::driver('google')->user();

            // Verificar si el usuario ya existe
            $existingUser = User::where('email', $googleUser->getEmail())->first();

            if (!$existingUser) {
                // Si el usuario no existe, crear uno nuevo
                $existingUser = User::create([
                    'nick' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'id_role' => 1,  // Asigna el rol según tu lógica
                    'profile_image' => $googleUser->getAvatar(),
                ]);
            }

            // Autenticar al usuario
            Auth::login($existingUser);

            // Redirigir a la página principal
            return redirect()->intended('/')->with('success', '¡Inicio de sesión exitoso!');

        } catch (\Exception $e) {
            // En caso de error, redirigir al login con un mensaje de error
            return redirect()->route('login')->withErrors(['error' => 'Error al iniciar sesión con Google: ' . $e->getMessage()]);
        }
    }

    // Método para el inicio de sesión tradicional con email y contraseña
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Obtener el rol del usuario autenticado
            $id_role = Auth::user()->id_role; // Asumiendo que la columna se llama 'role'

            // Guardar el rol en la sesión
            $request->session()->put('role', $id_role);
            // Verificar si el rol es 2
            if ($id_role == 2) {
                return redirect()->route('auth.admi.dashboard.index')->with('success', '¡Inicio de sesión exitoso!');
            }

            return redirect()->intended('/')->with('success', '¡Inicio de sesión exitoso!');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ])->with('error', 'Credenciales incorrectas.');
    }

    // Método para mostrar la vista de login
    public function showLoginForm()
    {
        return view('auth.login');
    }


    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', '¡Has cerrado sesión correctamente!');
    }
}
