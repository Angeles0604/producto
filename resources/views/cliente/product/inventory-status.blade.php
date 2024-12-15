@if($product->inventory->isEmpty())
    <p class="text-red-500 font-semibold">Producto no disponible en este momento</p>
@else
    <p class="text-green-600 font-semibold">Disponibilidad:</p>
    <ul>
        @foreach($product->inventory as $item)
            <li>{{ $item->size->size_name }} - {{ $item->color->color_name }}: {{ $item->quantity }} en stock</li>
        @endforeach
    </ul>
@endif
