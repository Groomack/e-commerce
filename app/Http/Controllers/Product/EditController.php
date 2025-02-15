<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\Product\StoreRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Product;

class EditController extends BaseController
{
    public function __invoke(Product $product)
    {   
        $data = [
            'product' => $product,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'colors' => Color::all(),
            'colorsProduct' => $product->colors->pluck('id')->toArray(),
            'tagsProduct' => $product->tags->pluck('id')->toArray(),
        ];

        return view('product.edit', compact('data'));
    }
}
