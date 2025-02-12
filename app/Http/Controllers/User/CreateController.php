<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CreateController extends Controller
{
    public function __invoke()
    {
        $genders = User::getGenders();
        return view('user.create', compact('genders'));    
    }
}
