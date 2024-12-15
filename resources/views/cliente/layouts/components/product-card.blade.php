<div class="border rounded-lg shadow-md p-4 bg-white hover:shadow-lg transition-shadow duration-300">
    <a href="{{ route('product.show', $product->id_product) }}">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover rounded-md mb-4">
        <h3 class="text-lg font-semibold text-gray-800">{{ $product->product_name }}</h3>
        <p class="text-gray-600">{{ $product->price }} USD</p>
    </a>
</div>
