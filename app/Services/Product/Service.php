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
    public function update($data, $product)
    {
        $tags = $data['tags'] ?? '';
        $colors = $data['colors'] ?? '';
        if(!isset($data['previewImage']))
        {
            $data['previewImage'] = $product->previewImage;
        } else {
            $data['previewImage'] = Storage::disk('public')->put('products', $data['previewImage']);
            Storage::disk('public')->delete($product->previewImage);
        }
        unset($data['tags'], $data['colors']);
        DB::transaction(function () use($product, $data, $tags, $colors) {
            $product->update($data);
            
            if($tags) {
                $product->tags()->sync($tags);
            } else {
                $product->tags()->sync([]);
            }
            if($colors) {
                $product->colors()->sync($colors);
            } else {
                $product->colors()->sync([]);
            }
        });
    }
}