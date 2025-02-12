<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class DestroyController extends Controller
{
    public function __invoke(Color $color)
    {
        $color->delete();
        return redirect()->route('colors.index')->with('deleted', 'Цвет удален!');    
    }
}
