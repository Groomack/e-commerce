<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Tag;
use App\Models\Category;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $data = [
            'colors' => Color::all(),
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ];
        return view('product.create', compact('data'));    
    }
}
