@extends('admin.layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="container mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-semibold mb-6">Editar Producto</h1>

    <form action="{{ route('admin.products.update', $product->id_product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Nombre del Producto</label>
            <input type="text" name="product_name" class="w-full border p-2 rounded" value="{{ $product->product_name }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Marca</label>
            <select name="id_brand" class="w-full border p-2 rounded">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id_brand }}" {{ $product->id_brand == $brand->id_brand ? 'selected' : '' }}>
                        {{ $brand->brand_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Categorías</label>
            @foreach($categories as $category)
                <label class="inline-flex items-center">
                    <input type="checkbox" name="categories[]" value="{{ $category->id_category }}" {{ $product->categories->contains($category->id_category) ? 'checked' : '' }}>
                    <span class="ml-2">{{ $category->category_name }}</span>
                </label>
            @endforeach
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Precio</label>
            <input type="number" name="price" class="w-full border p-2 rounded" value="{{ $product->price }}" step="0.01" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Descripción</label>
            <textarea name="product_description" class="w-full border p-2 rounded">{{ $product->product_description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Estado</label>
            <select name="status" class="w-full border p-2 rounded">
                <option value="1" {{ $product->status ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ !$product->status ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <!-- Imagen Principal -->
        <div class="mb-4">
            <label class="block text-gray-700">Imagen Principal Actual</label>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen actual" class="w-32 h-32 mb-2 rounded">
            @else
                <p class="text-gray-500">No hay imagen disponible.</p>
            @endif
            <label class="block text-gray-700 mt-2">Subir Nueva Imagen Principal</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
        </div>

        <!-- Imagen Adicional Única -->
        <div class="mb-4">
            <label class="block text-gray-700">Imagen Adicional Actual</label>
            @if($product->images->first())
                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="Imagen adicional actual" class="w-32 h-32 mb-2 rounded">
            @else
                <p class="text-gray-500">No hay imagen adicional.</p>
            @endif
            <label class="block text-gray-700 mt-2">Subir Nueva Imagen Adicional</label>
            <input type="file" name="additional_image" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar Producto</button>
    </form>
</div>
@endsection
