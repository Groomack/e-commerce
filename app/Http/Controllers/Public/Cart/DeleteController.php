<?php

namespace App\Http\Controllers\Public\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($product)
    {
        $cart = session('cart');
        unset($cart[$product]);
        session()->put('cart', $cart);
        return redirect()->back();    
    }
}
