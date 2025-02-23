<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DestroyController extends BaseController
{
    public function __invoke(Product $product)
    {   
        $this->service->destroy($product);
        
        return redirect()->route('products.index')->with('deleted', 'Товар удален');
    }
}
