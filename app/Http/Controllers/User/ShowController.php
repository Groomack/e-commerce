<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        $data = $user;
        $data->gender = $user->genderName;
        return view('user.show', compact('data'));    
    }
}
