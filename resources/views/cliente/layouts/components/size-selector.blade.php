<div class="flex space-x-2">
    @foreach($sizes as $size)
        <label class="cursor-pointer">
            <input type="radio" name="size" value="{{ $size->id_size }}" class="hidden">
            <span class="px-3 py-1 border rounded hover:bg-blue-500 hover:text-white">{{ $size->size_name }}</span>
        </label>
    @endforeach
</div>
