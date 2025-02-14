<?php

namespace App\Services\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class Service 
{
    public function store($data)
    {
        $tags = $data['tags'];
        $colors = $data['colors'];
        unset($data['tags'], $data['colors']);
        $data['previewImage'] = Storage::disk('public')->put('products', $data['previewImage']);
        DB::transaction(function () use($data) {
            Product::firstOrCreate([
                'title' => $data['title']
            ], $data);
        });
    }
}