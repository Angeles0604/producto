<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dirección</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .header {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .sidebar {
            width: 250px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            font-size: 1rem;
            padding: 10px 0;
            color: #333;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .menu-item:hover {
            background-color: #f9fafb;
        }

        .main-content {
            flex-grow: 1;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .main-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-field {
            display: flex;
            flex-direction: column;
        }

        .form-field label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .form-field input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            width: 100%;
        }

        .btn-save {
            background-color: #3876f1;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 20px;
        }

        .btn-save:hover {
            background-color: #1d4ba6;
        }

        .layout {
            display: flex;
            gap: 20px;
        }
    </style>
</head>

<body>
    @include('components.growl')
    @include('/cliente/layouts.header')

    <div class="container">
        <div class="header">Hola, {{ Auth::user()->nick ?? 'Usuario' }}</div>
        <div class="layout">
            <!-- Menú Lateral -->
            <div class="sidebar">
                <a class="menu-item" href="{{ route('account.profile') }}">Mi Perfil</a>
                <a class="menu-item" href="{{ route('account.address') }}">Direcciones</a>
                <a class="menu-item" href="#">Medios de pago</a>
            </div>

            <!-- Contenido Principal -->
            <div class="main-content">
                <div class="main-title">Editar Dirección</div>

                <!-- Formulario para editar la dirección -->
                <form action="{{ route('account.address.update', $address->id_address) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <div class="form-field">
                            <label for="address_line1">Línea de Dirección 1</label>
                            <input type="text" id="address_line1" name="address_line1"
                                value="{{ old('address_line1', $address->address_line1) }}"
                                placeholder="Ingresa la dirección principal" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-field">
                            <label for="address_line2">Línea de Dirección 2</label>
                            <input type="text" id="address_line2" name="address_line2"
                                value="{{ old('address_line2', $address->address_line2) }}"
                                placeholder="Ingresa detalles adicionales de dirección (opcional)">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-field">
                            <label for="city">Ciudad</label>
                            <input type="text" id="city" name="city" value="{{ old('city', $address->city) }}"
                                placeholder="Ingresa la ciudad" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-field">
                            <label for="state">Estado/Provincia</label>
                            <input type="text" id="state" name="state" value="{{ old('state', $address->state) }}"
                                placeholder="Ingresa el estado o provincia" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-field">
                            <label for="postal_code">Código Postal</label>
                            <input type="text" id="postal_code" name="postal_code"
                                value="{{ old('postal_code', $address->postal_code) }}"
                                placeholder="Ingresa el código postal" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-field">
                            <label for="country">País</label>
                            <input type="text" id="country" name="country"
                                value="{{ old('country', $address->country) }}" placeholder="Ingresa el país" required>
                        </div>
                    </div>

                    <!-- Botón Guardar Cambios -->
                    <button type="submit" class="btn-save">Actualizar Dirección</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>