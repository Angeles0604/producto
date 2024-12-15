<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta de Usuario - Direcciones</title>
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

        .address-list {
            margin-top: 20px;
        }

        .address-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #f9fafb;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }

        .action-icons {
            display: flex;
            gap: 10px;
        }

        /* Estilos del modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px !important;
            width: 1000px !important;
            max-width: 95% !important;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #333;
            cursor: pointer;
            font-weight: bold;
        }

        .form-group {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-field {
            flex: 1;
        }

        .form-field label {
            display: block;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .form-field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.95rem;
        }

        .save-button {
            text-align: right;
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
                <div class="main-title">Lista de Direcciones</div>

                <!-- Lista de Direcciones -->
                <div class="address-list">
                    @foreach($addresses as $address)
                        <div class="address-item">
                            <div class="address-details">
                                <span>{{ $address->address_line1 }}, {{ $address->address_line2 }}, {{ $address->city }},
                                    {{ $address->state }}, {{ $address->postal_code }}, {{ $address->country }}</span>
                            </div>
                            <div class="action-icons">
                                <a href="{{ route('account.address.edit', $address->id_address) }}">✏️</a>
                                <form action="{{ route('account.address.destroy', $address->id_address) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="background: none; border: none; color: inherit; cursor: pointer;">🗑️</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Botón para abrir el modal de nueva dirección -->
                <div style="text-align: right; margin-top: 20px;">
                    <button onclick="openModal()" class="btn-save">Agregar dirección</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar dirección -->
    <div id="addressModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Nueva Dirección de Envío</h2>
            <form action="{{ route('account.address.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <!-- Campo Address Line 1 -->
                    <div class="form-field">
                        <label for="address_line1">Línea de Dirección 1</label>
                        <input type="text" id="address_line1" name="address_line1"
                            placeholder="Ingresa la dirección principal" required>
                    </div>

                    <!-- Campo Address Line 2 -->
                    <div class="form-field">
                        <label for="address_line2">Línea de Dirección 2</label>
                        <input type="text" id="address_line2" name="address_line2"
                            placeholder="Ingresa detalles adicionales de dirección (opcional)">
                    </div>
                </div>

                <div class="form-group">
                    <!-- Campo Ciudad -->
                    <div class="form-field">
                        <label for="city">Ciudad</label>
                        <input type="text" id="city" name="city" placeholder="Ingresa la ciudad" required>
                    </div>

                    <!-- Campo Estado/Provincia -->
                    <div class="form-field">
                        <label for="state">Estado/Provincia</label>
                        <input type="text" id="state" name="state" placeholder="Ingresa el estado o provincia" required>
                    </div>
                </div>

                <div class="form-group">
                    <!-- Campo Código Postal -->
                    <div class="form-field">
                        <label for="postal_code">Código Postal</label>
                        <input type="text" id="postal_code" name="postal_code" placeholder="Ingresa el código postal"
                            required>
                    </div>

                    <!-- Campo País -->
                    <div class="form-field">
                        <label for="country">País</label>
                        <input type="text" id="country" name="country" placeholder="Ingresa el país" required>
                    </div>
                </div>

                <!-- Botón Guardar Dirección -->
                <div class="save-button">
                    <button type="submit" class="btn-save">Guardar Dirección</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('addressModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('addressModal').style.display = 'none';
        }

        // Cierra el modal si se hace clic fuera de él
        window.onclick = function (event) {
            const modal = document.getElementById('addressModal');
            if (event.target === modal) {
                closeModal();
            }
        };
    </script>
</body>

</html>