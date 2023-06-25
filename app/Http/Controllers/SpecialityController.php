<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use GuzzleHttp\Exception\ServerException;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private  $url;
    private  $img_url;

    public function __construct()
    {
      $this->url = config('constants.url');
      $this->img_url = config('constants.img_url');
    }

    public function index()
    {
        $specialties = getRequest($this->url.'/api/specialties/GetAllSpecialties');
        return view('admin.specialities',['url'=>$this->img_url,'specialties'=>$specialties]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
        }
        $input = $request->input();
        $validator = Validator::make($input, [
            'speciality' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $token = session()->get('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        $apiURL = $this->url . '/api/specialties/CreateSpecialty';
        $client = new \GuzzleHttp\Client();
        
        try {
            $response = $client->request('POST', $apiURL, [
                'multipart' => [
                    [
                        'name' => 'SpecialtyName',
                        'contents' => $input['speciality']
                    ],
                    [ 
                        'name' => 'ImageFile',
                        'contents' => fopen($image->getPathname(), 'r')  // Open the image file
                    ],  
                    [
                        'name' => 'Image',
                        'contents' => $originalName
                    ],   

                ],
                'headers' => $headers,
            ],              
        );
        } catch (ServerException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            $responseBody = $response->getBody()->getContents();
        }
        
        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);
        
        if ($statusCode == 200) {
            if ($responseBody['isSuccess']) {
                return redirect()->route('speciality.index')->with('success', 'Speciality Change successful!');
            } else {
                return redirect()->back()->with(['error' => $responseBody['message']])->withInput();
            }
        } else {
            return abort(500);
        }

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
        }else{
            $originalName = 'image';
        }
        
        $input = $request->input();
        $validator = Validator::make($input, [
            'speciality' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $token = session()->get('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        $apiURL = $this->url . '/api/specialties/UpdateSpecialty';
        $client = new \GuzzleHttp\Client();
        
        try {
            $response = $client->request('PUT', $apiURL, [
                'multipart' => [
                    [
                        'name' => 'SpecialtyName',
                        'contents' => $input['speciality']
                    ],
                    [
                        'name' => 'IsDelete',
                        'contents' => 'false', // Open the image file
                    ],  
                    [
                        'name' => 'Image',
                        'contents' => $originalName
                    ],  
                     [
                        'name' => 'Id',
                        'contents' => $id
                    ],  
                     [
                        'name' => 'specialtyId',
                        'contents' => $id
                    ],   

                ],
                'headers' => $headers,
                ],              
            );
        } catch (ServerException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            $responseBody = $response->getBody()->getContents();
        }
        
        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);
        
        if ($statusCode == 200) {
            if ($responseBody['isSuccess']) {
                return redirect()->route('speciality.index')->with('success', 'Speciality Change successful!');
            } else {
                return redirect()->back()->with(['error' => $responseBody['message']])->withInput();
            }
        } else {
            return abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $token = Session()->get('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        $apiURL = $this->url.'/api/specialties/DeleteSpecialtyById';
        $postInput = [
            'SpecialtyId' =>  $id,
        ];       
        $client = new \GuzzleHttp\Client();
        try{
            $response = $client->request('PUT', $apiURL, ['form_params' => $postInput,'headers' => $headers]);
        }catch(Exception $e){
            return abort(500);
        }
        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);
        if ($statusCode == 200) {
            if($responseBody['isSuccess']){
                return redirect()->back();
            }else{
                return redirect()->back()->with(['error'=>$responseBody['message']])->withInput();
            }   
        } else {
            return abort(500);
        } 
    }
}
