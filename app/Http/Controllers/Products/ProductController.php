<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\ProductImage; // Asegúrate de importar el modelo ProductImage
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Obtener los últimos 5 productos agregados, ordenados por fecha de creación
        $latestProducts = Product::latest()->take(5)->get();

        // Obtener todos los productos para las tarjetas
        $allProducts = Product::all();

        return view('index', compact('latestProducts', 'allProducts'));
    }

    public function show($sku)
    {
        // Buscar el producto por su SKU
        $product = Product::where('product_sku', $sku)->firstOrFail();
        // Obtener las imágenes asociadas al producto y sus colores
        $images = ProductImage::where('product_id', $product->id_product)
            ->with('color')  // Relación con colores
            ->get();

        // Obtener los colores y tamaños disponibles para este producto desde la tabla inventory
        $inventory = Inventory::where('product_sku', $sku)
            ->with(['color', 'size'])  // Cargar las relaciones de color y tamaño
            ->get();

        // Crear arreglos de colores y tamaños para pasarlos a la vista
        $colors = $inventory->pluck('color')->unique('id_color');
        $sizes = $inventory->pluck('size')->unique('id_size');

        // Pasar el producto, imágenes, colores y tamaños a la vista
        return view('cliente.product.show', compact('product', 'colors', 'sizes', 'images'));
    }


}
