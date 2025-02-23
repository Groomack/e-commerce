<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;

class IndexController extends BaseController
{
    public function __invoke()
    {   
        $data = Product::paginate(10);
        return view('product.index', compact('data'));
    }
}
