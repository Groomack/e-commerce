<?php

namespace App\Http\Controllers\Public\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $product)
    {
        $cart = session()->get('cart');
        if($request->input('quantity') == 0) {
            unset($cart[$product]);
        } else {
            $cart[$product]['quantity'] = $request->input('quantity');
        }
        session()->put('cart', $cart);
        return redirect()->back();    
    }
}
