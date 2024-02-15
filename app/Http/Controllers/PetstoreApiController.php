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

    public function delete($id){

        $response = Http::delete('https://petstore.swagger.io/v2/pet/'.$id);

        if ($response->successful()) {
            return view('partials.pet', ['message' => 'Pet successfully deleted']);
        } else {
            return view('partials.pet', ['error' => 'Failed to delete pet']);
        }
    }
}
