@extends('cliente.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-blue-600 mb-4">Añadir Dirección de Envío</h1>

    <form action="{{ route('checkout.saveAddress') }}" method="POST">
        @csrf
        <label class="block font-semibold mt-4">Línea de Dirección 1:</label>
        <input type="text" name="address_line1" class="border rounded p-2 w-full" required>

        <label class="block font-semibold mt-4">Línea de Dirección 2:</label>
        <input type="text" name="address_line2" class="border rounded p-2 w-full">

        <label class="block font-semibold mt-4">Ciudad:</label>
        <input type="text" name="city" class="border rounded p-2 w-full" required>

        <label class="block font-semibold mt-4">Estado:</label>
        <input type="text" name="state" class="border rounded p-2 w-full" required>

        <label class="block font-semibold mt-4">Código Postal:</label>
        <input type="text" name="postal_code" class="border rounded p-2 w-full" required>

        <label class="block font-semibold mt-4">País:</label>
        <input type="text" name="country" class="border rounded p-2 w-full" required>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-4">Guardar Dirección</button>
    </form>
</div>
@endsection
