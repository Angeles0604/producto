@extends('cliente.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-blue-600">Proceso de Checkout</h1>
        <!-- Botón de Volver -->
        <a href="{{ route('cart.index') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition-colors">
            Volver al Carrito
        </a>
    </div>

    @if($cart->isEmpty())
        <p class="text-gray-700">Tu carrito está vacío.</p>
    @else
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Resumen del Carrito</h2>
        <ul>
            @foreach($cart as $item)
                <li>{{ $item->product->product_name }} - Talla: {{ $item->size->size_name }}, Color: {{ $item->color->color_name }} - Cantidad: {{ $item->quantity }} - Precio: {{ number_format($item->product->price, 2) }} USD</li>
            @endforeach
        </ul>
        <p class="text-lg font-semibold text-green-600 mt-4">Total: {{ number_format($cart->sum(fn($item) => $item->product->price * $item->quantity), 2) }} USD</p>

        <h2 class="text-2xl font-semibold text-gray-700 mt-6 mb-4">Dirección de Envío</h2>
        @if($addresses->isEmpty())
            <p class="text-gray-700">No tienes ninguna dirección guardada. <a href="{{ route('checkout.address') }}" class="text-blue-600 hover:underline">Añadir Dirección</a></p>
        @else
            <form action="{{ route('checkout.payment') }}" method="GET">
                <select name="address_id" class="border rounded p-2 w-full mb-4" required>
                    @foreach($addresses as $address)
                        <option value="{{ $address->id_address }}">{{ $address->address_line1 }}, {{ $address->city }}, {{ $address->state }}, {{ $address->country }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Proceder al Pago</button>
            </form>
        @endif
    @endif
</div>
@endsection
