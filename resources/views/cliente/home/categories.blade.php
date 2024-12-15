<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($categories as $category)
        <div class="border rounded-lg shadow-md p-4 bg-white hover:shadow-lg transition-shadow duration-300">
            <a href="{{ route('catalog.category', $category->id_category) }}">
                @if($category->image)
                    <img src="{{ $category->image }}" alt="{{ $category->category_name }}" class="w-full h-48 object-cover rounded-md mb-4">
                @endif
                <h3 class="text-lg font-semibold text-gray-800">{{ $category->category_name }}</h3>
            </a>
        </div>
    @endforeach
</div>
