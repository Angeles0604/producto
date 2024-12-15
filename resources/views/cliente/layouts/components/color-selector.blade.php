<div class="flex space-x-2">
    @foreach($colors as $color)
        <label class="cursor-pointer">
            <input type="radio" name="color" value="{{ $color->id_color }}" class="hidden">
            <span class="w-8 h-8 rounded-full inline-block" style="background-color: {{ $color->hex_code ?? '#000' }};"></span>
        </label>
    @endforeach
</div>
