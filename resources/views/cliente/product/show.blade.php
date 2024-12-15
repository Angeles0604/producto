<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fb;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }

        .image-gallery,
        .product-details {
            flex: 1;
            padding: 10px;
        }

        .image-gallery img {
            width: 70%;
            border-radius: 8px;
            transition: transform 0.3s;
        }

        .image-gallery img:hover {
            transform: scale(1.05);
        }

        .thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .thumbnails img {
            width: 80px;
            cursor: pointer;
            border-radius: 4px;
            transition: opacity 0.3s;
        }

        .thumbnails img:hover {
            opacity: 0.7;
        }

        .product-details h1 {
            font-size: 2rem;
            margin: 0;
            color: #333;
        }

        .price {
            font-size: 1.5rem;
            color: #10b981;
            font-weight: bold;
            margin: 10px 0;
        }

        .options {
            margin-top: 20px;
        }

        .options label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .options select,
        .options input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button {
            background-color: #2563eb;
            color: #fff;
            padding: 12px;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            width: 100%;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #1d4ed8;
        }

        .points-info {
            margin-top: 20px;
            padding: 10px;
            background-color: #e3f2fd;
            border-radius: 5px;
            font-size: 0.9rem;
            color: #333;
        }
    </style>
</head>

<body>
    <!-- Incluir el Header -->
    @include('/cliente/layouts.header')
    <form method="POST" action="{{ route('cart.add') }}">
        @csrf <!-- Token CSRF para la seguridad de Laravel -->
        <div class="container">
        <input type="hidden" name="product_id" value="{{ $product->id_product }}">

            <!-- Galería de imágenes -->
            <div class="image-gallery">
                <!-- Imagen principal del producto que se actualizará según el color -->
                <img id="mainImage"
                    src="{{ $images->isNotEmpty() ? $images->first()->image_path : 'https://via.placeholder.com/400' }}"
                    alt="Imagen principal del producto">

                <div class="thumbnails">
                    <!-- Miniaturas de las imágenes que se cambiarán según el color -->
                    @foreach($images as $image)
                        <img class="thumbnail" src="{{ $image->image_path }}" data-color="{{ $image->color_id }}"
                            alt="Miniatura de imagen"
                            onclick="changeImage('{{ $image->image_path }}', {{ $image->color_id }})">
                    @endforeach
                </div>
            </div>

            <!-- Detalles del producto -->
            <div class="product-details">
                <h1>{{ $product->product_name }}</h1>
                <p class="price">{{ number_format($product->price, 2) }} USD</p>
                <div class="options">
                    <!-- Selección de color -->
                    <label for="color">Color:</label>
                    @if($colors->isEmpty())
                        <p>Sin stock</p>
                    @else
                        <select name="color_id" id="colorSelect" required onchange="filterImagesByColor()">
                            @foreach($colors as $color)
                                <option value="{{ $color->id_color }}">{{ $color->color_name }}</option>
                            @endforeach
                        </select>
                    @endif

                    <!-- Selección de talla -->
                    <label for="size">Talla:</label>
                    @if($sizes->isEmpty())
                        <p>Sin stock</p>
                    @else
                        <select name="size_id" required>
                            @foreach($sizes as $size)
                                <option value="{{ $size->id_size }}">{{ $size->size_name }}</option>
                            @endforeach
                        </select>
                    @endif

                    <!-- Cantidad -->
                    <label for="quantity">Cantidad:</label>
                    @if($sizes->isEmpty() || $colors->isEmpty())
                        <p>No disponible</p>
                    @else
                        <input type="number" id="quantity" name="quantity" min="1" value="1">
                    @endif
                </div>
                <button class="button" type="submit">Agregar alos Carrito</button>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div id="loginModal" style="display: none;">
        <div class="modal-overlay" onclick="closeModal()"></div> <!-- Fondo translúcido -->
        <div class="modal-content">
            <h3>¡Necesitas iniciar sesión!</h3>
            <p>Por favor, inicia sesión para agregar productos al carrito.</p>
            <!-- Usamos el helper route() de Laravel para generar la URL de login -->
            <button class="btn" onclick="window.location.href = '{{ route('login') }}'">Iniciar
                sesión</button>
            <button class="btn cancel" onclick="closeModal()">Cancelar</button>
        </div>
    </div>

    <script>
        function checkLoginStatus() {
            var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }}; // Verificación del login

            if (!isLoggedIn) {
                // Mostrar modal de login
                document.getElementById("loginModal").style.display = "block";
            } else {
                // Aquí puedes agregar la lógica para agregar al carrito
                alert("Producto agregado al carrito");
            }
        }

        function closeModal() {
            document.getElementById("loginModal").style.display = "none";
        }

        // Función para cambiar la imagen principal cuando se hace clic en una miniatura
        function changeImage(imagePath, colorId) {
            // Cambiar la imagen principal
            document.getElementById('mainImage').src = imagePath;

            // Actualizar el selector de color para que coincida con la miniatura seleccionada
            document.getElementById('colorSelect').value = colorId;
        }

        // Función para filtrar las imágenes según el color seleccionado
        function filterImagesByColor() {
            var selectedColorId = document.getElementById("colorSelect").value;

            // Obtener todas las miniaturas
            var thumbnails = document.querySelectorAll(".thumbnail");

            // Cambiar la imagen principal según el color seleccionado
            thumbnails.forEach(function (thumbnail) {
                if (thumbnail.getAttribute("data-color") == selectedColorId) {
                    // Si la miniatura es la primera de ese color, actualizar la imagen principal
                    if (document.getElementById("mainImage").src !== thumbnail.src) {
                        document.getElementById("mainImage").src = thumbnail.src;
                    }
                }
            });
        }

        // Llamar la función para filtrar imágenes al cargar la página (por defecto)
        document.addEventListener('DOMContentLoaded', function () {
            filterImagesByColor();
        });
    </script>

</body>

</html>