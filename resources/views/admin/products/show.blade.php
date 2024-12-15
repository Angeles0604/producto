@extends('admin.layouts.app')

@section('title', 'Detalles del Producto')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6">Detalles del Producto</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold">{{ $product->product_name }}</h2>

        <p><strong>SKU:</strong> {{ $product->product_sku }}</p>
        <p><strong>Marca:</strong> {{ $product->brand->brand_name ?? 'Sin Marca' }}</p>
        <p><strong>Precio:</strong> {{ number_format($product->price, 2) }} USD</p>
        <p><strong>Estado:</strong> {{ $product->status ? 'Activo' : 'Inactivo' }}</p>
        <p><strong>Descripción:</strong> {{ $product->product_description }}</p>

        <!-- Mostrar categorías -->
        <div class="mt-4">
            <strong>Categorías:</strong>
            <ul class="list-disc list-inside">
                @foreach ($product->categories as $category)
                    <li>{{ $category->category_name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Imagen principal -->
        <div class="mt-4">
            <strong>Imagen Principal:</strong>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen principal del producto" class="w-32 h-32 rounded mt-2">
            @else
                <p class="text-gray-500">No hay imagen principal disponible para este producto.</p>
            @endif
        </div>

        <!-- Imágenes adicionales -->
        <div class="mt-4">
            <strong>Imágenes Adicionales:</strong>
            <div class="flex space-x-4">
                @forelse($product->images as $image)
                    <div>
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Imagen adicional" class="w-24 h-24 rounded mt-2">
                        <form action="{{ route('admin.product_images.destroy', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline mt-2">Eliminar</button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-500">No hay imágenes adicionales.</p>
                @endforelse
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.products.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Volver a la lista de productos</a>
            <a href="{{ route('admin.products.edit', $product->id_product) }}" class="bg-yellow-500 text-white px-4 py-2 rounded ml-2">Editar Producto</a>
        </div>
    </div>
</div>
@endsection
