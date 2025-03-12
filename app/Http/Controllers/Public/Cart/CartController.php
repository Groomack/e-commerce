<?php

namespace App\Http\Controllers\Public\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __invoke()
    {
        return view('public.cart.cart');    
    }
}
