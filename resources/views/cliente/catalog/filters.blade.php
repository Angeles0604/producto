<div class="flex space-x-4 mb-6">
    <form action="{{ route('catalog.index') }}" method="GET" class="flex space-x-2">
        <!-- Filtro por marca -->
        <select name="brand" class="border p-2 rounded">
            <option value="">Filtrar por Marca</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id_brand }}">{{ $brand->brand_name }}</option>
            @endforeach
        </select>

        <!-- Filtro por categoría -->
        <select name="category" class="border p-2 rounded">
            <option value="">Filtrar por Categoría</option>
            @foreach($categories as $category)
                <option value="{{ $category->id_category }}">{{ $category->category_name }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Aplicar</button>
    </form>
</div>
