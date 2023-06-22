<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $apiURL = $this->url.'/api/specialties/CreateSpecialty';
        $postInput = [
            'SpecialtyName  ' => $input['speciality'],  
            'ImageFile' => base64_encode(file_get_contents($image->getPathname())), 
            'Image' => $originalName,  
        ];    
        $client = new \GuzzleHttp\Client();
        try{
            $response = $client->request('POST', $apiURL, ['form_params' => $postInput]);
        }catch(Exception $e){
            return abort(500);
        }
        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);
        if ($statusCode == 200) {
            if($responseBody['isSuccess']){
                return redirect()->route('speciality.index')->with('success', 'Speciality Change successful!');
            }else{
                return redirect()->back()->with(['error'=>$responseBody['message']])->withInput();
            }   
        } else {
            return abort(500);
        } 


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
