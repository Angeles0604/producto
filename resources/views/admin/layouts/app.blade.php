<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panel de Administración - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <!-- Wrapper principal -->
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside style="background-color: #06073b;" class="w-64 bg-blue-800 text-white h-full flex-shrink-0">
            <div class="h-full overflow-y-auto">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-center">Panel de Administración</h1>
                </div>
                <nav class="mt-6">
                    <a href="{{ route('admin.dashboard') }}"
                        class="block px-4 py-2 hover:bg-blue-600 transition-colors">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.products.index') }}"
                        class="block px-4 py-2 hover:bg-blue-600 transition-colors">
                        Productos
                    </a>
                    <a href="#"
                        class=" block px-4 py-2 hover:bg-blue-600 transition-colors">
                        Categorías
                    </a>
                    <a href="#" class="block px-4 py-2 hover:bg-blue-600 transition-colors">
                        Marcas
                    </a>
                    <a href="#" class="block px-4 py-2 hover:bg-blue-600 transition-colors">
                        Usuarios
                    </a>
                    <a href="#" class="block px-4 py-2 hover:bg-blue-600 transition-colors">
                        Inventario
                    </a>
                    <a href="#" class="block px-4 py-2 hover:bg-blue-600 transition-colors">
                        Pedidos
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="px-4 py-2">
                        @csrf
                        <button type="submit" class="w-full text-left hover:text-blue-200">
                            Cerrar Sesión
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Contenido principal -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
            <div class="container mx-auto px-2 py-2">
                <!-- Contenido de la página -->
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>