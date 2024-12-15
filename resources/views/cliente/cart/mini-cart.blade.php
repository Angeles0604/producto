@if($cart->isNotEmpty())
    <div class="p-4 border rounded-lg shadow-lg">
        <h2 class="text-lg font-bold mb-2">Resumen del Carrito</h2>
        <ul>
            @foreach($cart as $item)
                <li>{{ $item->product->product_name }} x {{ $item->quantity }}</li>
            @endforeach
        </ul>
        <p class="mt-2 font-bold">Total: {{ number_format($cart->sum('total'), 2) }} USD</p>
        <a href="{{ route('cart.index') }}" class="text-blue-600 hover:underline">Ver Carrito</a>
    </div>
@else
    <p class="text-gray-600">Tu carrito está vacío.</p>
@endif
