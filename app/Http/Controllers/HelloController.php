<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    // Viewの場所を指定する
    public function index()
    {
        return view('hellos.hello');
    }
}
