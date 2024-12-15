<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap JS (necesario para el carrusel) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>


<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <style>
        :focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        hr {
            border: 0;
            border-top: 1px solid #ccc;
        }

        /* Estilo general para la tarjeta y el carrusel */
        .card-carousel {
            background-color: transparent;
            padding: 20px;
            border-radius: 10px;
            margin: 20px;
            text-align: center;
        }

        h3 {
            color: #333;
            font-family: 'Arial', sans-serif;
            margin-bottom: 20px;
        }

        /* Estilo para el contenedor del carrusel */
        .carousel-container {
            display: flex;
            align-items: center;
            /* Centrar los botones verticalmente */
        }

        /* Estilo para los botones de navegación */
        .carousel-button {
            background-color: #6b58523b;
            border: none;
            color: white;
            font-size: 1.5rem;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 0 10px;
            /* Espaciado entre botones y carrusel */
        }

        .carousel-button:hover {
            background-color: #e64a19;
            /* Color de fondo al pasar el mouse */
        }

        /* Contenedor del carrusel */
        .carousel-custom {
            display: flex;
            overflow: hidden;
            /* Ocultar lo que no está en la vista */
            scroll-behavior: smooth;
            gap: 10px;
            /* Espaciado entre los ítems */
        }

        /* Cada ítem del carrusel */
        .product-item {
            flex: 0 0 33.33%;
            /* Cada ítem ocupará el 33.33% del ancho del contenedor */
            box-sizing: border-box;
            /* Para que el padding no afecte el ancho del ítem */
            transition: transform 0.3s ease-in-out;
            /* Suavizar el movimiento */
            margin: 0 10px;
            /* Espaciado entre los productos */
        }

        .product-item:hover {
            transform: scale(1.05);
        }

        /* Contenido del producto */
        .product-item-content {
            padding: 10px;
        }

        .product-link {
            text-decoration: none;
            color: inherit;
        }

        /* Imagen del producto */

        /* Imagen del producto */
        .product-image-carrousel {
            width: 100%;
            /* La imagen ocupa todo el ancho del ítem */
            height: 250px;
            /* Altura fija */
            object-fit: scale-down;
            /* Mantener la proporción de la imagen */
            border-radius: 10px;
        }

        /* Estilo para el nombre y precio del producto */
        h4 {
            font-size: 1.1rem;
            /* Ajustar el tamaño */
            margin: 10px 0;
            color: #333;
        }

        /* Estilos para la descripción del producto */
        .product-description {
            border-radius: 8px;
            /* Bordes redondeados */
            padding: 15px;
            /* Espaciado interno */
            transition: transform 0.3s, box-shadow 0.3s;
            /* Transiciones suaves */
            margin-top: 10px;
            /* Espacio superior */
        }



        /* Estilo del nombre del producto */
        .product-description h4 {
            font-size: 1.5rem;
            /* Tamaño de fuente grande */
            color: #333;
            /* Color del texto */
            margin: 0 0 10px;
            /* Espaciado */
            font-weight: 600;
            /* Negrita */
        }

        /* Estilo del precio */
        .product-price {
            font-size: 1.25rem;
            /* Tamaño de fuente para el precio */
            color: #e67e22;
            /* Color llamativo */
            font-weight: 700;
            /* Negrita */
        }

        /* Estilo del badge de disponibilidad */
        .product-badge {
            display: inline-block;
            /* Ajuste en línea */
            padding: 5px 10px;
            /* Espaciado interno */
            border-radius: 20px;
            /* Bordes redondeados */
            font-size: 0.875rem;
            /* Tamaño de fuente */
            font-weight: 500;
            /* Negrita suave */
            color: #fff;
            /* Color del texto */
        }

        /* Colores de estado */
        .status-available {
            background-color: #2ecc71;
            /* Verde para disponible */
        }

        .status-unavailable {
            background-color: #e74c3c;
            /* Rojo para no disponible */
        }


        .status-available {
            background-color: #4caf50;
        }

        .status-unavailable {
            background-color: #f44336;
        }

        .latest-releases {
            font-family: 'Arial', sans-serif;
            font-size: 2em;
            color: #333;
            text-align: center;
            margin: 20px 0;
            position: relative;
        }

        .latest-releases::after {
            content: '';
            display: block;
            width: 50%;
            height: 4px;
            background-color: #007bff;
            margin: 10px auto;
            border-radius: 5px;
        }

        .latest-releases:hover {
            color: #007bff;
            cursor: pointer;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .product-item {
                flex: 0 0 50%;
                /* Muestra 2 productos a la vez en pantallas más pequeñas */
            }
        }

        @media (max-width: 480px) {
            .product-item {
                flex: 0 0 100%;
                /* Muestra 1 producto a la vez en pantallas muy pequeñas */
            }
        }
    </style>

    <!-- Incluir el Header -->
    @include('components.growl')
    @include('/cliente/layouts.header')

    <!-- Contenido de la página -->
    <h3 class="latest-releases">¡Últimos Lanzamientos!</h3>
    <div class="card-carousel">
        <div class="carousel-container">
            <!-- Botón de navegación izquierda -->
            <button class="carousel-button left" onclick="scrollCarousel(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>

            <!-- Carrusel personalizado -->
            <div class="carousel carousel-custom">
                @forelse($latestProducts as $product)
                    <div class="product-item">
                        <div class="product-item-content">
                            <a href="{{ route('product.detail', ['sku' => $product->product_sku]) }}" class="product-link">
                                <div class="mb-3">
                                    <img src="{{ $product->image }}" alt="{{ $product->product_name }}"
                                        class="product-image-carrousel predefined-size" />
                                </div>
                                <div class="product-description">
                                    <h5 class="mb-1">{{ $product->brand->brand_name ?? 'Marca no disponible' }}</h5>
                                    <h4 class="mb-1">{{ $product->product_name }}</h4>
                                    <h6 class="mt-0 mb-3">
                                        <span class="product-price">
                                            S/ {{ number_format($product->price, 2, '.', ',') }}
                                        </span>
                                    </h6>
                                    <span class="product-badge status-{{ $product->status ? 'available' : 'unavailable' }}">
                                        {{ $product->status ? 'Disponible' : 'No disponible' }}
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div>No hay productos disponibles.</div>
                @endforelse
            </div>

            <!-- Botón de navegación derecha -->
            <button class="carousel-button right" onclick="scrollCarousel(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <style>
        /* Contenedor de las tarjetas */
        .products-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* Tres columnas */
            gap: 20px;
            /* Espacio entre las tarjetas */
            margin: 0 auto;
            padding: 20px;
            max-width: 1200px;
            /* Ancho máximo del contenedor */
        }

        /* Para pantallas más pequeñas (como tablets y móviles), usar 2 o 1 columna */
        @media (max-width: 1024px) {
            .products-container {
                grid-template-columns: repeat(2, 1fr);
                /* Dos columnas */
            }
        }

        @media (max-width: 768px) {
            .products-container {
                grid-template-columns: 1fr;
                /* Una columna */
            }
        }

        /* Contenedor principal de la tarjeta */
        .product-card {
            width: 100%;
            max-width: 300px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            margin: 0 auto;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Estilo para la imagen del producto */
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Contenedor de la información del producto */
        .product-info {
            padding: 15px;
            text-align: center;
        }

        .product-name {
            font-size: 1.25rem;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
        }

        .product-price {
            font-size: 1.1rem;
            color: #e67e22;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 15px;
        }

        .product-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .product-status.available {
            background-color: #4caf50;
            color: white;
        }

        .product-status.unavailable {
            background-color: #f44336;
            color: white;
        }

        .new-releases {
            font-family: 'Arial', sans-serif;
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            margin-left: 50px;
            padding-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>

    <!-- Cards de index -->
    <h3 class="new-releases">Nuestros Productos!</h3>
    <div class="products-container">
        @forelse($allProducts as $product)
            <div class="product-card">
                <a href="{{ route('product.detail', ['sku' => $product->product_sku]) }}" class="product-link">
                    <div class="mb-3">
                        <img src="{{ $product->image }}" alt="{{ $product->product_name }}"
                            class="product-image-carrousel predefined-size" />
                    </div>
                    <div class="product-info">
                        <h5 class="mb-1">{{ $product->brand->brand_name ?? 'Marca no disponible' }}</h5>
                        <h4 class="product-name">{{ $product->product_name }}</h4>
                        <h6 class="mt-0 mb-3">
                            <span class="product-price">
                                S/ {{ number_format($product->price, 2, '.', ',') }}
                            </span>
                        </h6>
                        <span class="product-status {{ $product->status ? 'available' : 'unavailable' }}">
                            {{ $product->status ? 'Disponible' : 'No disponible' }}
                        </span>
                    </div>
                </a>
            </div>
        @empty
            <div>No hay productos disponibles.</div>
        @endforelse
    </div>



</body>

</html>


<script>
    const carousel = document.querySelector('.carousel-custom');
    const items = document.querySelectorAll('.product-item');
    const itemWidth = items[0].offsetWidth + 20; // Ancho de cada ítem más el espacio entre ellos
    let scrollInterval;
    const scrollDuration = 2000; // Tiempo en milisegundos para el desplazamiento automático

    // Función para desplazar el carrusel de 1 en 1 producto
    function scrollCarousel(direction) {
        const currentScroll = carousel.scrollLeft;
        const maxScroll = carousel.scrollWidth - carousel.offsetWidth; // Máximo desplazamiento del carrusel

        if (direction === 1) {
            // Si el carrusel ha llegado al final, volver al principio
            if (currentScroll + itemWidth >= maxScroll) {
                carousel.scrollLeft = 0;
            } else {
                carousel.scrollLeft += itemWidth; // Desplazar 1 ítem a la vez
            }
        } else {
            // Si estamos al principio, ir al final
            if (currentScroll <= 0) {
                carousel.scrollLeft = maxScroll;
            } else {
                carousel.scrollLeft -= itemWidth; // Retroceder 1 ítem a la vez
            }
        }
    }

    // Iniciar el desplazamiento automático
    function startAutoScroll() {
        scrollInterval = setInterval(() => {
            scrollCarousel(1); // Desplazar hacia la derecha automáticamente
        }, scrollDuration);
    }

    // Detener el desplazamiento automático
    function stopAutoScroll() {
        clearInterval(scrollInterval);
    }

    // Control de botones
    document.querySelector('.left').addEventListener('click', () => {
        stopAutoScroll(); // Detener el desplazamiento automático al presionar un botón
        scrollCarousel(-1); // Retroceder
    });

    document.querySelector('.right').addEventListener('click', () => {
        stopAutoScroll(); // Detener el desplazamiento automático al presionar un botón
        scrollCarousel(1); // Avanzar
    });

    // Iniciar el desplazamiento automático al cargar la página
    window.onload = startAutoScroll;

    // Reiniciar el desplazamiento automático al dejar de interactuar (opcional)
    carousel.addEventListener('mouseenter', stopAutoScroll);
    carousel.addEventListener('mouseleave', startAutoScroll);
</script>