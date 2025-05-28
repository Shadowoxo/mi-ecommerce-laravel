<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Mostrar la lista de productos en la página principal (welcome)
     * Ruta: GET /
     */
    public function indexWelcome()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    /**
     * Mostrar la lista de productos en el catálogo
     * Ruta: GET /productos
     */
    public function index()
    {
        $products = Product::all();
        return view('productos.index', compact('products'));  
    }

    /**
     * Agrega un producto al carrito y redirige de vuelta
     * Ruta: GET /cart/add/{id}
     *
     * @param Request $request
     * @param int $id  ID del producto
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name'     => $product->name,
                'quantity' => 1,
                'price'    => $product->price,
                'image'    => $product->image_path,
            ];
        }

        session()->put('cart', $cart);
        $request->session()->flash('success', 'Producto agregado al carrito');

        return redirect()->back();
    }
}
