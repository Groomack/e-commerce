<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;

class IndexController extends BaseController
{
    public function __invoke()
    {   
        $data = [
            'products' => Product::all(),
        ];
        return view('product.index', compact('data'));
    }
}
