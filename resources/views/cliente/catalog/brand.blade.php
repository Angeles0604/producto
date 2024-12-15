@extends('cliente.layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-blue-600 mb-6">Marca: {{ $brand->brand_name }}</h1>

        <!-- Lista de productos por marca -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
            @foreach($products as $product)
                <div class="border rounded-lg shadow-md p-4 bg-white hover:shadow-lg transition-shadow duration-300">
                    <a href="{{ route('product.show', $product->id_product) }}">
                        <img src="{{ $product->image }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover rounded-md mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $product->product_name }}</h3>
                        <p class="text-gray-600">{{ number_format($product->price, 2) }} USD</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
