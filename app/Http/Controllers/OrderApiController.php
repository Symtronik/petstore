<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function index()
    {
     
        return view('partials.order');
    }
}
