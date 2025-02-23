<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = Category::paginate(10);
        return view('category.index', compact('data'));    
    }
}
