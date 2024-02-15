<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function index()
    {
        // $response = Http::get('https://petstore.swagger.io/v2/pet/2')->json();
        // return $response;
        return view('components.order');
    }
}
