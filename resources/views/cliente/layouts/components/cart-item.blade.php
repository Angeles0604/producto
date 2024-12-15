<div class="flex items-center space-x-4 border-b py-4">
    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->product_name }}" class="w-16 h-16 object-cover rounded">
    <div class="flex-1">
        <h4 class="text-lg font-semibold text-gray-800">{{ $item->product->product_name }}</h4>
        <p class="text-sm text-gray-600">Talla: {{ $item->size->size_name }} | Color: {{ $item->color->color_name }}</p>
        <p class="text-sm text-gray-600">Cantidad: {{ $item->quantity }}</p>
        <p class="text-sm font-semibold text-gray-800">Subtotal: {{ $item->product->price * $item->quantity }} USD</p>
    </div>
    <button type="button" class="text-red-500 hover:text-red-700">Eliminar</button>
</div>
