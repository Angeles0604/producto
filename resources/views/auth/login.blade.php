<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html {
            height: 100%;
        }

        body {
            background-color: #4c4c4c;
        }

        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, .5);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 10px;
        }

        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus~label,
        .login-box .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #03e9f4;
            font-size: 12px;
        }

        .login-btn {
            background-color: #007bff;
            color: #fff;
            width: 100%;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        .social-login {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .social-login button {
            width: 48%;
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #03e9f4;
        }

        #togglePassword {
            color: white;
            /* Cambia el color del icono a blanco */
            position: absolute;
            /* Asegúrate de que esté en posición absoluta */
            top: 15px;
            /* Ajusta la posición vertical */
            right: 0.5rem;
            /* Ajusta el espaciado a la derecha */
            cursor: pointer;
        }

        .user-box {
            position: relative;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .login-box {
                padding: 30px;
                width: 100%;
            }

            .social-login button {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    @include('components.growl')

    <div class="login-box">
        <h2>Iniciar Sesión</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="user-box">
                <input type="email" name="email" required>
                <label>Correo Electrónico:</label>
            </div>
            <div class="user-box position-relative">
                <input type="password" name="password" id="password" required>
                <label>Contraseña:</label>
                <span id="togglePassword">
                    <i class="fa fa-eye"></i>
                </span>
            </div>
            <button type="submit" class="btn login-btn">Iniciar Sesión</button>
            <div class="register-link">
                ¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
            </div>
            <div class="register-link">
                ¿Quieres ver nuestros productos? <a href="{{ route('index') }}">Regresa aquí</a>
            </div>
            <p class="text-center mt-3">Iniciar sesión con:</p>
            <div class="social-login">
                <button id="google-login" type="button" class="btn btn-outline-primary">Google</button>
                <button id="facebook-login" type="button" class="btn btn-outline-primary">Facebook</button>
            </div>
        </form>
    </div>

    <script>
        // Script para alternar visibilidad de la contraseña
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });

        // llama boton para iniciar por google
        document.getElementById('google-login').addEventListener('click', function () {
            window.location.href = '{{ route("loginWithGoogle") }}';
        });

        // llama boton para iniciar por facebook
        document.getElementById('facebook-login').addEventListener('click', function () {
            window.location.href = '{{ route("loginWithFacebook") }}';
        });
    </script>

</body>

</html>