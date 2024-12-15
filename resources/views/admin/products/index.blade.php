@extends('admin.layouts.app')

@section('title', 'Gestión de Productos')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-6">Gestión de Productos</h1>

        <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Crear Producto</a>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">Imagen</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Marca</th>
                    <th class="px-4 py-2">Precio</th>
                    <th class="px-4 py-2">Estado</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-b">
                        <td class="px-4 py-2">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-500">Sin imagen</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $product->product_name }}</td>
                        <td class="px-4 py-2">{{ $product->brand->brand_name ?? 'Sin Marca' }}</td>
                        <td class="px-4 py-2">{{ number_format($product->price, 2) }} USD</td>
                        <td class="px-4 py-2">{{ $product->status ? 'Activo' : 'Inactivo' }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('admin.products.show', $product->id_product) }}" class="bg-green-600 text-white px-4 py-2 rounded">Ver</a>
                            <a href="{{ route('admin.products.edit', $product->id_product) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Editar</a>
                            <form action="{{ route('admin.products.destroy', $product->id_product) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
