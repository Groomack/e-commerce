<?php

namespace App\Http\Filters;

use App\Models\Product;

class ProductFilter extends QueryFilter
{
   public function category($id = null)
   {    
    if(isset($id)) {
        return $this->builder->where('category_id', $id);
    } else {
        return Product::all();
    }
   }
   public function sort($id = null)
   {    
    switch($id) {
        case 1: return $this->builder->orderByDesc('price');
        break;
        case 2: return $this->builder->orderBy('price');
        break;
        default: return Product::all();
        break;
    }
   }
}