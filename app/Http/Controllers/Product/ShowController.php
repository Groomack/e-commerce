<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;

class ShowController extends BaseController
{
    public function __invoke(Product $product)
    {   
        $data = [
            'product' => $product,
        ];
        return view('product.show', compact('data'));
    }
}
