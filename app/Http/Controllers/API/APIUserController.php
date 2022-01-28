<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIUserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function auth(){
        return response()->json([
            'user' => Auth::user()
        ]);
    }
}
