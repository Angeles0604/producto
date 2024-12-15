<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <style>
        /* CSS Reset */
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-size: 100%;
            font-family: sans-serif;
        }

        body {
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        img,
        picture,
        video,
        canvas,
        svg {
            display: block;
            max-width: 100%;
        }

        input,
        button,
        textarea,
        select {
            font: inherit;
        }

        button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul,
        ol {
            list-style: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote::before,
        blockquote::after,
        q::before,
        q::after {
            content: '';
        }

        /* Estilos para mejorar el diseño del header */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #FFA500;
            padding: 10px 20px;
            color: white;
            font-family: Arial, sans-serif;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            width: 40px;
            height: auto;
            margin-right: 10px;
        }

        .navbar .title {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
        }

        .navbar .search-container {
            display: flex;
            align-items: center;
            position: relative;
        }

        .navbar .search-container input[type="text"] {
            padding: 8px 12px;
            border: none;
            border-radius: 20px;
            width: 300px;
            outline: none;
        }

        .navbar .search-container button {
            position: absolute;
            right: 0;
            background: none;
            border: none;
            padding: 8px;
            cursor: pointer;
        }

        .navbar .search-container button img {
            width: 20px;
            height: auto;
        }

        .navbar .cart {
            display: flex;
            align-items: center;
            font-size: 18px;
            color: #ffffff;
            cursor: pointer;
            position: relative;
        }

        .navbar .cart-icon {
            font-size: 24px;
            margin-right: 5px;
        }

        /* Menú desplegable de usuario */
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            min-width: 200px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            overflow: hidden;
            z-index: 1;
            color: black;
            font-size: 16px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Estilos para el modal del carrito */
        .modal {
            display: none;
            position: fixed;
            z-index: 2;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            max-width: 90%;
            text-align: center;
        }

        .modal-content h2 {
            margin-top: 0;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="{{ config('ecomerce.logo_src') }}" alt="{{ config('ecomerce.nombre') }} Logo">
                <a href="{{ route('index') }}" class="title">{{ config('ecomerce.nombre') }}</a>
            </div>
            <!-- Campo de búsqueda con lupa -->
            <div class="search-container">
                <input type="text" placeholder="Buscar calzados..." aria-label="Buscar productos">
                <button type="submit">
                    <img src="https://img.icons8.com/ios-filled/50/000000/search.png" alt="Buscar"> <!-- Lupa -->
                </button>
            </div>
            <!-- Muestra el carrito y el perfil si el usuario está autenticado -->
            @auth
                <div class="cart" onclick="window.location.href='{{ route('cart.detail') }}'">
                    <span class="cart-icon">🛒</span> <!-- Icono de carrito -->
                </div>
                <div class="cart" onclick="toggleUserMenu(event)">
                    <span>{{ auth()->user()->nick }}</span>
                    <!-- Menú desplegable de usuario -->
                    <div class="dropdown-content" id="userDropdown">
                        <a href="{{ route('account.profile') }}">Mi cuenta</a>

                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            <!-- Muestra "Iniciar sesión" si el usuario no está autenticado -->
            @guest
                <a href="{{ route('login') }}" style="color: white; font-weight: bold;">Iniciar sesión</a>
            @endguest
        </div>
    </header>


    <script>


        // Función para cerrar el modal del carrito
        function closeCartModal() {
            document.getElementById("cartModal").style.display = "none";
        }

        // Cerrar el modal cuando el usuario hace clic fuera del contenido
        window.onclick = function (event) {
            const modal = document.getElementById("cartModal");
            if (event.target === modal) {
                closeCartModal();
            }
        };

        // Alternar la visibilidad del menú desplegable de usuario
        function toggleUserMenu(event) {
            event.stopPropagation();
            const dropdown = document.getElementById("userDropdown");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        }

        // Cerrar el menú desplegable de usuario si se hace clic fuera de él
        window.onclick = function (event) {
            const dropdown = document.getElementById("userDropdown");
            if (dropdown && dropdown.style.display === "block" && !event.target.closest('.cart')) {
                dropdown.style.display = "none";
            }

            const modal = document.getElementById("cartModal");
            if (event.target === modal) {
                closeCartModal();
            }
        };
    </script>
</body>

</html>