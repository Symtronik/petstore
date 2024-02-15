<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PetstoreApiController extends Controller
{
    public function index()
    {
        if(request()->has('search')){
            $response = Http::get('https://petstore.swagger.io/v2/pet/'.request()->get('search', ''))->json();
        }

        return view('partials.pet', ['petData' => $response]);
    }
}
