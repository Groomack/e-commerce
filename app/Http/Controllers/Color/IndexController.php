<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = Color::paginate(10);
        return view('color.index', compact('data'));    
    }
}
