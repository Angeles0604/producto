@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>body{background-color: #06073b !important;}</style>
<div class="grid gap-6 border-2 border-gray-300 rounded-lg overflow-hidden">
    <div style="background-color: #06073b;"
        class="bg-gradient-to-br from-purple-600 to-indigo-700 rounded-lg shadow-lg p-6">
        <!-- Header modificado -->
        <div class="flex justify-between items-center mb-6">
            <p class="text-white mb-6">
                Bienvenido, <strong>{{ Auth::user()->first_name }}!!!</strong> al panel de administración. Desde aquí
                podrás gestionar los
                productos,
                usuarios, inventario, y otros aspectos de la tienda.
            </p>
            <p class="text-2xl font-bold text-white"> <!-- Añadido font-bold aquí -->
                Bienvenido, {{ Auth::user()->first_name }}!
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Tarjeta de Productos -->
            <div style="background-color: #FF8C00;" class="rounded-lg p-6 shadow-lg">
                <h3 class="font-semibold text-white mb-2 text-lg">Productos</h3>
                <p class="text-white mb-4">Gestiona y actualiza los productos de la tienda.</p>
                <div class="bg-orange-700 rounded-lg p-2 inline-block">
                    <a href="#"
                        class="text-white hover:text-orange-300 font-medium flex items-center">
                        Ver productos
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tarjeta de Categorías -->
            <div style="background-color: #00BFFF;" class="rounded-lg p-6 shadow-lg">
                <h3 class="font-semibold text-white mb-2 text-lg">Categorías</h3>
                <p class="text-white mb-4">Gestiona las categorías disponibles.</p>
                <div class="bg-cyan-700 rounded-lg p-2 inline-block">
                 
                     <a href="#"
                        class="text-white hover:text-cyan-300 font-medium flex items-center">
                        Ver categorías
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tarjeta de Marcas -->
            <div style="background-color: #D5006D;" class="rounded-lg p-6 shadow-lg">
                <h3 class="font-semibold text-white mb-2 text-lg">Marcas</h3>
                <p class="text-white mb-4">Administra las marcas de productos.</p>
                <div class="bg-pink-700 rounded-lg p-2 inline-block">
                    <a href="#"
                     class="text-white hover:text-pink-300 font-medium flex items-center">
                        Ver marcas
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tarjeta de Usuarios -->
            <div style="background-color: #4CAF50;" class="rounded-lg p-6 shadow-lg">
                <h3 class="font-semibold text-white mb-2 text-lg">Usuarios</h3>
                <p class="text-white mb-4">Gestiona los usuarios de la tienda.</p>
                <div class="bg-emerald-700 rounded-lg p-2 inline-block">
                    <a href="#"
                        class="text-white hover:text-emerald-300 font-medium flex items-center">
                        Ver usuarios
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tarjeta de Pedidos -->
            <div style="background-color: #8E24AA;" class="rounded-lg p-6 shadow-lg">
                <h3 class="font-semibold text-white mb-2 text-lg">Pedidos</h3>
                <p class="text-white mb-4">Revisa los pedidos de clientes.</p>
                <div class="bg-violet-700 rounded-lg p-2 inline-block">
                    <a href="#"
                        class="text-white hover:text-violet-300 font-medium flex items-center">
                        Ver pedidos
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tarjeta de Inventario -->
            <div style="background-color: #F50057;" class="rounded-lg p-6 shadow-lg">
                <h3 class="font-semibold text-white mb-2 text-lg">Inventario</h3>
                <p class="text-white mb-4">Gestiona el inventario y el historial de movimientos.</p>
                <div class="bg-fuchsia-700 rounded-lg p-2 inline-block">
                    <a href="#"
                        class="text-white hover:text-fuchsia-300 font-medium flex items-center">
                        Ver inventario
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection