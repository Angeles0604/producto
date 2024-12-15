<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach($images as $image)
        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover rounded">
    @endforeach
</div>
