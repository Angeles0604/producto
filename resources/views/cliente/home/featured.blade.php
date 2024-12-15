<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($featuredProducts as $product)
        <div class="border rounded-lg shadow-md p-4 bg-white hover:shadow-lg transition-shadow duration-300">
            <a href="{{ route('product.show', $product->id_product) }}">
                <img src="{{ $product->image }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold text-gray-800">{{ $product->product_name }}</h3>
                <p class="text-gray-600">{{ number_format($product->price, 2) }} USD</p>
            </a>
        </div>
    @endforeach
</div>
