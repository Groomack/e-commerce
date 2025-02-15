<?php

namespace App\Services\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class Service 
{
    public function store($data)
    {
        $tags = $data['tags'] ?? '';
        $colors = $data['colors'] ?? '';
        unset($data['tags'], $data['colors']);
        $data['previewImage'] = Storage::disk('public')->put('products', $data['previewImage']);
        DB::transaction(function () use($data, $tags, $colors) {
            $product = Product::firstOrCreate([
                'title' => $data['title']
            ], $data);
            
            if($tags) {$product->tags()->attach($tags);}
            if($colors) {$product->colors()->attach($colors);}
        });
    }
}