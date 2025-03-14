<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(Category $category)
    {
        $data = $category;
        return view('category.edit', compact('data'));    
    }
}
