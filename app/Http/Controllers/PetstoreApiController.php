<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PetstoreApiController extends Controller
{
    public function index()
    {
        $response = Http::get('https://petstore.swagger.io/v2/pet/2')->json();
        return $response;
    }
}
