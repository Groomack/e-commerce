<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DestroyController extends BaseController
{
    public function __invoke(Product $product)
    {   
        DB::transaction(function () use($product) {
            Storage::disk('public')->delete($product->previewImage);
            $product->tags()->detach();
            $product->colors()->detach();
            $product->delete();
            
        });
        
        return redirect()->route('products.index')->with('deleted', 'Товар удален');
    }
}
