<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PetstoreApiController extends Controller
{

    public function index()
    {
        // $response = Http::get('https://petstore.swagger.io/v2/pet/2')->json();
        // return $response;
        return view('partials.pet');
    }

    public function search()
    {
        $searchValue = request()->get('search', '');

        if(is_numeric($searchValue)){
            $response = Http::get('https://petstore.swagger.io/v2/pet/'.$searchValue)->json();
            return view('partials.pet', ['petData' => $response]);
        } else {
            if(in_array($searchValue, ['available', 'pending', 'sold'])) {
                $response = Http::get('https://petstore.swagger.io/v2/pet/findByStatus?status='.$searchValue)->json();
                return view('partials.pet', ['petData' => $response]);


            } else {
                return view('partials.pet', ['error' => "Status does't exist"]);
            }
        }


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
