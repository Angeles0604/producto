<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 900px;
            margin: auto;
            padding: 2rem;
        }

        h1 {
            color: #007bff;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .empty-cart {
            text-align: center;
            color: #6c757d;
            font-size: 1.2rem;
        }

        .product-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .product-card:hover {
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
        }

        .product-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }

        .product-details {
            font-size: 1rem;
            color: #555;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745;
            margin-top: 0.5rem;
        }

        .quantity-input {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        .update-btn {
            background-color: #007bff;
            color: white;
            padding: 0.75rem;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 0.5rem;
        }

        .update-btn:hover {
            background-color: #0056b3;
        }

        .remove-btn {
            background-color: #dc3545;
            color: white;
            padding: 0.75rem;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 0.5rem;
        }

        .remove-btn:hover {
            background-color: #c82333;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            text-align: center;
            margin-top: 2rem;
        }

        .primary-btn,
        .secondary-btn {
            font-size: 1.25rem;
            font-weight: bold;
            padding: 0.75rem;
            border-radius: 8px;
            text-align: center;
            color: white;
            display: inline-block;
            width: 100%;
            text-decoration: none;
        }

        .primary-btn {
            background-color: #28a745;
        }

        .primary-btn:hover {
            background-color: #218838;
        }

        .secondary-btn {
            background-color: #007bff;
        }

        .secondary-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>


    <!-- Incluir el Header -->
    @include('components.growl')    
    @include('/cliente/layouts.header')


    <div class="container">
        <h1>Carrito de Comprasss</h1>

        @if($cart->isEmpty())
            <div class="empty-cart">
                <p>Tu carrito está vacío. ¡Agrega productos para empezar a comprar!</p>
                <a href="{{ route('index') }}" class="primary-btn">Ir a la Tienda</a>
            </div>
        @else
            @foreach($cart as $item)
                <div class="product-card">
                    <img src="{{ $item->product_image_path }}" alt="Estamos procesando..." class="product-image">
                    <h2 class="product-title">{{ $item->product->product_name }}</h2>
                    <p class="product-details">
                        <strong>Tamaño:</strong> {{ $item->size->size_name }} |
                        <strong>Color:</strong> {{ $item->color->color_name }}
                    </p>
                    <p class="product-price">{{ number_format($item->product->price, 2) }} USD</p>

                    <form method="POST" action="{{ route('cart.update', $item->id_detail) }}" class="mt-3">
                        @csrf
                        @method('PUT')
                        <label for="quantity" class="text-sm font-medium mb-2">Cantidad:</label>
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="quantity-input">
                        <button type="submit" class="update-btn">Actualizar</button>
                    </form>

                    <form method="POST" action="{{ route('cart.remove', $item->id_detail) }}" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-btn">Eliminar</button>
                    </form>
                </div>
            @endforeach

            <div class="action-buttons">
                <a href="#" class="primary-btn">Comprar Productos</a>
                <a href="{{ route('index') }}" class="secondary-btn">Continuar Comprando</a>
            </div>
        @endif
    </div>
</body>

</html>