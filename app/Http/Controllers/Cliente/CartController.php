<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['error' => 'No autenticado.']);
        }

        // Obtener los productos en el carrito con las relaciones adecuadas
        $cart = CartDetail::with(['product', 'size', 'color'])
            ->where('id_user', Auth::id())
            ->get();

        // Iterar sobre los elementos del carrito para obtener las imágenes
        $cart->map(function ($item) {
            // Verificar el valor de id_color
           
        
            // Obtener la imagen del producto basada en color y producto
            $product_img = ProductImage::where('color_id', $item->id_color)
                ->where('product_id', $item->product->id_product)
                ->first();  
        
            if ($product_img) {
                $item->product_image_path = $product_img->image_path; 
            } else {
                $item->product_image_path = null; 
            }
        });
        
        
        // Pasar los datos del carrito a la vista
        return view('cliente/cart/cartDetail', ['cart' => $cart]);
    }




    public function addToCart(Request $request)
    {

        // Validar la solicitud
        $request->validate([
            'product_id' => 'required|exists:products,id_product',
            'size_id' => 'required|exists:sizes,id_size',
            'color_id' => 'required|exists:colors,id_color',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        $productId = $request->input('product_id');
        $sizeId = $request->input('size_id');
        $colorId = $request->input('color_id');
        $quantity = $request->input('quantity');

        // Verificar si el producto ya está en el carrito con el mismo tamaño y color
        $existingItem = CartDetail::where('id_user', $userId)
            ->where('id_product', $productId)
            ->where('id_size', $sizeId)
            ->where('id_color', $colorId)
            ->first();
        

        try {
            if ($existingItem) {
                // Si el producto ya está en el carrito, incrementar la cantidad
                $existingItem->quantity += $quantity;
                $existingItem->save();
            } else {
                // Si no está en el carrito, agregarlo como un nuevo elemento
                CartDetail::create([
                    'id_user' => $userId,
                    'id_product' => $productId,
                    'id_size' => $sizeId,
                    'id_color' => $colorId,
                    'quantity' => $quantity,
                    'active' => true,
                ]);
            }

            return redirect()->route('cart.detail')->with('success', 'Producto agregado al carrito');
        } catch (\Exception $e) {
            return redirect()->route('cart.detail')->with('error', 'Hubo un problema al agregar el producto al carrito.');
        }
    }

    public function update(Request $request, $id_detail)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $item = CartDetail::findOrFail($id_detail);
        $item->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.detail')->with('success', 'Cantidad actualizada');
    }

    public function remove($id_detail)
    {
        $item = CartDetail::findOrFail($id_detail);
        $productName = $item->product->name;

        // Eliminar el producto del carrito
        $item->delete();

        return redirect()->route('cart.detail')->with('success', "Producto '{$productName}' eliminado del carrito");
    }


}
