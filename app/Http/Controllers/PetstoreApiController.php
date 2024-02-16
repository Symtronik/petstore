<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PetstoreApiController extends Controller
{

    public function index()
    {

        return view('partials.pet');
    }

    public function add(Request $request)
    {

        $petName = $request->input('petName');

        if($petName) {
            $categoryName = $request->input('categoryName');
            $photoUrls = $request->input('photoUrls');
            $tagName = $request->input('tagName');
            $status = $request->input('status');

            $data = [
                'id' => 9999,
                'category' => [

                    'name' => $categoryName
                ],
                'name' => $petName,
                'photoUrls' => [$photoUrls],
                'tags' =>[ [

                        'name' => $tagName

                ]],
                'status' => $status
            ];

            $response = Http::post('https://petstore.swagger.io/v2/pet/', $data);
            // $responseData = $response->json();
            // dd($responseData);
            if ($response->successful()) {
                return view('partials.pet', ['message' => 'Pet successfully add']);
            } else {
                return view('partials.pet', ['error' => 'Failed to add pet']);
            }
        }else{
            return view('partials.petAdd', ['error' => "You didn't give pet name"]);
        }

    }

    public function edit($id){


        $response = Http::get('https://petstore.swagger.io/v2/pet/'.$id)->json();
        return view('partials.petEdit', ['petData' => $response]);
    }

    public function update(Request $request) {

        $petName = $request->input('petName');

        if($petName) {
            $id = $request->input('id');
            $categoryName = $request->input('categoryName');
            $photoUrls = $request->input('photoUrls');
            $tagName = $request->input('tagName');
            $status = $request->input('status');

            $data = [
                'id' => $id,
                'category' => [

                    'name' => $categoryName
                ],
                'name' => $petName,
                'photoUrls' => [$photoUrls],
                'tags' =>[ [

                        'name' => $tagName

                ]],
                'status' => $status
            ];

            $response = Http::put('https://petstore.swagger.io/v2/pet/', $data);

            if ($response->successful()) {
                // return view('partials.pet.search',['search' => $id,'message' => 'Pet successfully update']);
                return redirect()->route('partials.pet.search', ['search' => $id ,'message' => 'Pet successfully update']);
            } else {
                return view('partials.pet', ['error' => 'Failed to update pet']);
            }
        }else{
            return view('partials.petAdd', ['error' => "You didn't give pet name"]);
        }

    }

    public function search()
    {
        $searchValue = request()->get('search', '');
        $message = request()->get('message', '');

        if(is_numeric($searchValue)){
            $response = Http::get('https://petstore.swagger.io/v2/pet/'.$searchValue)->json();
            return view('partials.pet', ['petData' => $response, 'message' => $message]);
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
