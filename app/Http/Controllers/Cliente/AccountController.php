<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\ShippingAddress;
use GuzzleHttp\Client;


class AccountController extends Controller
{

    public function searchDNI(Request $request)
    {
        // Obtén el DNI desde el formulario
        $dni = $request->input('dni');

        if (!$dni) {
            return response()->json(['error' => 'DNI no proporcionado'], 400);
        }

        // Crear un cliente Guzzle
        $client = new Client();

        try {
            // Realizar la solicitud GET a la API
            $response = $client->request('GET', 'https://api.apis.net.pe/v2/reniec/dni', [
                'query' => [
                    'numero' => $dni, // Parámetro que se envía en la URL
                ],
                'headers' => [
                    'Authorization' => 'Bearer apis-token-10819.llkFAi0ciZHvqQWxVpQDD42jnXkMmGBn',
                    'Referer' => 'https://api.net.pe/consulta-dni-api',
                ]
            ]);

            // Obtener el contenido de la respuesta y devolverlo
            $data = json_decode($response->getBody()->getContents(), true);
            
            return response()->json($data);
        } catch (\Exception $e) {
            // Manejar cualquier error
            return response()->json(['error' => 'Hubo un error al realizar la solicitud.'], 500);
        }
    }


    /**
     * Actualizar el perfil del usuario.
     */
    public function updateProfile(Request $request)
    {
        try {
            $user = Auth::user();

            // Validación de los datos del perfil
            $request->validate([
                'dni' => 'nullable|string|max:20|unique:users,dni,' . $user->id_user,
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'nickname' => 'required|string|max:50',
                'phone' => 'nullable|string|max:9|min:9',
            ], [
                'dni.unique' => 'El DNI ya está registrado.',
                'first_name.required' => 'El campo "Nombres" es obligatorio.',
                'last_name.required' => 'El campo "Apellidos" es obligatorio.',
                'nickname.required' => 'El campo "Nickname" es obligatorio.',
                'phone.max' => 'El número de teléfono debe tener 9 caracteres.',
                'phone.min' => 'El número de teléfono debe tener 9 caracteres.',
            ]);

            // Actualizar datos del usuario
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->nick = $request->input('nickname');
            $user->phone = $request->input('phone');

            // Actualizar DNI solo si está vacío en la base de datos
            if (!$user->dni && $request->input('dni')) {
                $user->dni = $request->input('dni');
            }

            $user->save();

            return redirect()->route('account.profile')->with('success', 'Perfil actualizado correctamente.');
        } catch (ValidationException $e) {
            return redirect()->route('account.profile')->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error al actualizar el perfil: ' . $e->getMessage());
            return redirect()->route('account.profile')->with('error', 'Hubo un problema al actualizar el perfil.');
        }
        
    }

    /**
     * Mostrar lista de direcciones del usuario.
     */
    public function index()
    {
        $addresses = ShippingAddress::where('id_user', Auth::id())->get();
        return view('cliente.account.address', compact('addresses'));
    }

    /**
     * Almacenar una nueva dirección.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address_line1' => 'required|max:255',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'postal_code' => 'required|max:20',
            'country' => 'required|max:100',
        ]);

        ShippingAddress::create([
            'id_user' => Auth::id(),
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
        ]);

        return redirect()->route('account.address')->with('success', 'Dirección agregada correctamente.');
    }

    public function edit($id)
    {
        // Obtener la dirección específica del usuario autenticado
        $address = ShippingAddress::where('id_user', Auth::id())->findOrFail($id);

        // Retornar la vista con la variable $address
        return view('cliente.account.edit_address', compact('address'));
    }




    



    /**
     * Actualizar una dirección específica.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'address_line1' => 'required|max:255',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'postal_code' => 'required|max:20',
            'country' => 'required|max:100',
        ]);

        $address = ShippingAddress::where('id_user', Auth::id())->findOrFail($id);
        $address->update([
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
        ]);

        return redirect()->route('account.address')->with('success', 'Dirección actualizada correctamente.');
    }

    /**
     * Eliminar una dirección específica.
     */
    public function destroy($id)
    {
        $address = ShippingAddress::where('id_user', Auth::id())->findOrFail($id);
        $address->delete();

        return redirect()->route('account.address')->with('success', 'Dirección eliminada correctamente.');
    }
}
