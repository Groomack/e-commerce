<?php

namespace App\Http\Controllers\Public\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AddController extends Controller
{
    public function __invoke(Product $product)
    {
        $cart = session('cart');
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->title,
                'price' => $product->price,
                'colors' => $product->colors,
                'quantity' => 1,
            ];
        }
        session()->put('cart', $cart);
        
        return redirect()->back()->with('added', 'Товар добавлен в корзину');    
    }
}
