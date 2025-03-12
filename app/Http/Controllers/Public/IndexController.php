<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Filters\ProductFilter;

class IndexController extends Controller
{
    public function __invoke(ProductFilter $request)
    {
        $data = [
            'products' => Product::filter($request)->paginate(10),
            'categories' => Category::all(),
        ];
        return view('index', compact('data'));    
    }
}
