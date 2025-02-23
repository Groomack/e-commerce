<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = Tag::paginate(10);
        return view('tag.index', compact('data'));    
    }
}
