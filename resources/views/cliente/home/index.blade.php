@extends('cliente.layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-blue-600 mb-6">Bienvenido, {{ Auth::user()->first_name }}!</h1>
        <p class="text-lg text-gray-700 mb-8">Explora nuestros productos y encuentra el calzado perfecto para ti.</p>

        <!-- Sección de productos destacados -->
        <section>
            <h2 class="text-2xl font-semibold text-blue-500 mb-4">Productos Destacados</h2>
            @include('cliente.home.featured') <!-- Incluye la vista de productos destacados -->
        </section>

        <!-- Sección de categorías -->
        <section class="mt-8">
            <h2 class="text-2xl font-semibold text-blue-500 mb-4">Categorías</h2>
            @include('cliente.home.categories') <!-- Incluye la vista de categorías -->
        </section>
    </div>
@endsection
