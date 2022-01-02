<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('front.welcome');
    }

    public function about()
    {
        return view('front.about');
    }
}
