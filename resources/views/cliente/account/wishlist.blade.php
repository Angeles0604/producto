@extends('cliente.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-blue-600 mb-4">Mi Lista de Deseos</h1>

    @if($wishlist->isEmpty())
        <p>No tienes productos en tu lista de deseos.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($wishlist as $item)
                <div class="border rounded-lg shadow-md p-4 bg-white hover:shadow-lg transition-shadow duration-300">
                    <a href="{{ route('product.show', $item->product->id_product) }}">
                        <img src="{{ $item->product->image }}" alt="{{ $item->product->product_name }}" class="w-full h-48 object-cover rounded-md mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $item->product->product_name }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
