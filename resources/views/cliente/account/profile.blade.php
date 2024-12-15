<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cuenta de Usuario</title>
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

        /* Encabezado */
        .header {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Menú lateral */
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

        .menu-item svg {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* Contenido principal */
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
        }

        /* Botón guardar */
        .save-button {
            background-color: #f3f4f6;
            padding: 15px;
            text-align: center;
            border-top: 1px solid #ddd;
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





    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
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
                    <div class="main-title">Datos personales</div>

                    <div class="form-group">
                        <!-- Campo DNI -->
                        <div class="form-field">
                            <label for="dni">DNI</label>
                            <input type="text" id="dni" name="dni" value="{{ Auth::user()->dni }}"
                                placeholder="Ingresa tu DNI" {{ Auth::user()->dni ? 'disabled' : '' }}>

                            @if (!Auth::user()->dni)
                                <button type="button"  name="dni" id="search-dni" class="btn btn-search" value="{{ Auth::user()->dni }}">
                                    <i class="fas fa-search"></i>🔎
                                </button>
                            @endif
                        </div>

                        <!-- Campo Nombres -->
                        <div class="form-field">
                            <label for="first_name">Nombres</label>
                            <input type="text" id="first_name" name="first_name" value="{{ Auth::user()->first_name }}">
                        </div>

                        <!-- Campo Apellidos -->
                        <div class="form-field">
                            <label for="last_name">Apellidos</label>
                            <input type="text" id="last_name" name="last_name" value="{{ Auth::user()->last_name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Campo Correo -->
                        <div class="form-field">
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" disabled>
                        </div>

                        <!-- Campo nick -->
                        <div class="form-field">
                            <label for="nickname">Nickname</label>
                            <input type="text" id="nickname" name="nickname" value="{{ Auth::user()->nick }}">
                        </div>


                        <!-- Campo Teléfono -->
                        <div class="form-field">
                            <label for="phone">Teléfono</label>
                            <input type="text" id="phone" name="phone" placeholder="Ingresa tu número de teléfono"
                                pattern="^\+?[0-9]*$" title="Solo se permiten números y el símbolo +"
                                oninput="this.value = this.value.replace(/[^0-9+]/g, '');">
                        </div>

                    </div>
                </div>
            </div>

            <!-- Botón Guardar Cambios -->
            <div class="save-button">
                <button type="submit" id="btn-save" class="btn-save">Guardar</button>
            </div>
        </div>
    </form>

    <!-- Modal de confirmación -->
    <div id="confirmModal"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
        <div style="background-color: white; margin: 20% auto; padding: 20px; width: 300px; text-align: center;">
            <h3 id="modal-name"></h3> <!-- Muestra el nombre y apellido -->
            <p>¿Confirmas los datos?</p>
            <p id="modal-attempts">Solo tendrás un intento más.</p>
            <button id="btn-yes">Sí</button>
            <button id="btn-no">No</button>
        </div>
    </div>

</body>

<script>
    let intentos = 0; // Contador de intentos de confirmación
    const maxIntentos = 3; // Máximo de intentos

    // Variables globales para los datos del modal
    let dni, nombres, apellidoPaterno, apellidoMaterno;

    // Evento de búsqueda por DNI
    document.getElementById('search-dni').addEventListener('click', function () {

        // Asignar los datos a las variables globales
        dni = document.getElementById('dni').value;


        if (!dni) {
            alert('Por favor ingresa un DNI.');
            return;
        }

        // Enviar la solicitud a Laravel (en lugar de a la API directamente)
        fetch('{{ route('account.search.dni') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ dni: dni }) // Enviar el DNI como JSON
        })
            .then(response => response.json())
            .then(data => {
                // Manejar la respuesta de la API
                console.log(data);
                if (data.error) {
                    alert(data.error);
                } else {
                    // Mostrar el modal de confirmación con los datos del usuario
                    nombres = data.nombres;
                    apellidoPaterno = data.apellidoPaterno;
                    apellidoMaterno = data.apellidoMaterno;
                    showConfirmModal(dni, nombres, apellidoPaterno, apellidoMaterno);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un error al realizar la búsqueda.');
            });
    });

    // Mostrar el modal de confirmación
    function showConfirmModal(dni, nombres, apellidoPaterno, apellidoMaterno) {
        // Actualizar los datos en el modal
        document.getElementById('modal-name').innerText = `${nombres} ${apellidoPaterno} ${apellidoMaterno}`;

        // Mostrar el modal
        const modal = document.getElementById('confirmModal');
        modal.style.display = 'block';

        // Actualizar el mensaje según los intentos restantes
        document.getElementById('modal-attempts').innerText = `Solo tendrás ${maxIntentos - intentos} intento(s) más.`;
    }

    // Lógica de los botones de confirmación
    document.getElementById('btn-yes').addEventListener('click', function () {
        if (intentos < maxIntentos) {
            // Rellenar los campos de nombre y apellido con los datos
            document.getElementById('first_name').value = nombres;
            document.getElementById('last_name').value = `${apellidoPaterno} ${apellidoMaterno}`;

            // Enviar el formulario automáticamente o mostrar el botón de guardar
       //     document.querySelector('.btn-save').click();  // Este hace clic en el botón Guardar

            document.getElementById('confirmModal').style.display = 'none'; // Cerrar el modal
        } else {
            alert('Has agotado tus intentos.');
            document.getElementById('confirmModal').style.display = 'none'; // Cerrar el modal
        }
    });

    document.getElementById('btn-no').addEventListener('click', function () {
        // Incrementar los intentos y verificar si quedan intentos
        intentos++;
        if (intentos >= maxIntentos) {
            alert('Has agotado tus intentos. No puedes continuar.');
            document.getElementById('confirmModal').style.display = 'none'; // Cerrar el modal
        } else {
            alert(`Tienes ${maxIntentos - intentos} intento(s) más.`);
            document.getElementById('confirmModal').style.display = 'none'; // Cerrar el modal
        }
    });

</script>



</html>