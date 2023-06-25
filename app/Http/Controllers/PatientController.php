<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class PatientController extends Controller
{
    private  $url;
    private  $img_url;

    public function __construct()
    {
      $this->url = config('constants.url');
      $this->img_url = url('/').config('constants.img_url');
    }

    public function index(){
        $appointments = getRequest($this->url.'/api/Patient/GetMyAppointment');
        return view('front.patient.index',['url'=>$this->img_url,'appointments'=>$appointments]);
    } 
    public function favourites(){
        $favourites = getRequest($this->url.'/api/Patient/GetFavouritesDoctor');
        return view('front.patient.favourites',['url'=>$this->img_url,'favourites'=>$favourites]);
    } 
     public function getMessage(){
        return view('front.patient.chat');
    } 
    public function getPatientProfile(){
        return view('front.patient.patient-profile-settings');
    }  
     public function postPatientProfile(){
        return view('front.patient.index');
    }
    public function patientProfile($id){
     
        return view('front.patient.profile',['url'=>$this->img_url]);
    }
    public function postReviews(Request $request,$id){
        $input = $request->input();
        $validator = Validator::make($input, [
            'review' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $token = Session()->get('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        $apiURL = $this->url.'/api/review/AddReviewsForDoctor?doctorId='.$id;
        $postInput = [
            'Comment' =>  $input['review'],
        ];       
        $client = new \GuzzleHttp\Client();
        try{
            $response = $client->request('POST', $apiURL, ['form_params' => $postInput,'headers' => $headers]);
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
    public function bookAppointment(){
        return view('front.appointment');
    }
}
