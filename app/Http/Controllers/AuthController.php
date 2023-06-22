<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
       
    private  $url;

    public function __construct()
    {
      $this->url = config('constants.url');
    }

    public function getDoctorLogin(){
        if(Session()->has('user')){
            return redirect()->route('home');
        }
        return view('auth.login',['type' => 'Doctor']);
    }

    public function getPatientLogin(){
        if(Session()->has('user')){
            return redirect()->route('home');
        }
        return view('auth.login',['type' => 'Patient']);
    }
    public function getAdminLogin(){
        if(Session()->has('user')){
            return redirect()->route('home');
        }
        return view('auth.adminLogin');
    }

    public function postLogin(Request $request){
        $input = $request->input();
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $apiURL = $this->url.'/api/doctor/SignIn';
        $postInput = [
            'Email' =>  $input['email'],
            'Password' => $input['password']
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
                session(['api_token' => $responseBody['data']['token'] ,'userType' => $responseBody['data']['userType']]);
                Session(['user' => $responseBody['data']]);
                return redirect('/');
            }else{
                return redirect()->back()->with(['error'=>$responseBody['message']])->withInput();
            }   
        } else {
            return abort(500);
        } 
    }

    public function getDoctorSignup(){
        return view('auth.signup',['type' => 'Doctor']);
    }

    public function postDoctorSignup(Request $request){
        $input = $request->input();
        $validator = Validator::make($input, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $apiURL = $this->url.'/api/doctor/SignUp';
        $postInput = [
            'FirstName' =>  $input['first_name'],
            'LastName' => $input['last_name'],
            'Email' => $input['email'],
            'Password' => $input['password']
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
                session(['api_token' => $responseBody['data']['token'] , 'userType' => $responseBody['data']['userType']]);
                Session(['user' => $responseBody['data']]);
                return redirect('/');
            }else{
                return redirect()->back()->with(['error'=>$responseBody['message']])->withInput();
            }   
        } else {
            return abort(500);
        } 

    }
    public function getPatientSignup(){
        return view('auth.signup',['type' => 'Patient']);
    }

    public function postPatientSignup(Request $request){
        $input = $request->input();
        $validator = Validator::make($input, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $apiURL = $this->url.'/api/patient/SignUp';
        $postInput = [
            'FirstName' =>  $input['first_name'],
            'LastName' => $input['last_name'],
            'Email' => $input['email'],
            'Password' => $input['password']
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
                session(['api_token' => $responseBody['data']['token'] , 'userType' => $responseBody['data']['userType']]);
                Session(['user' => $responseBody['data']]);
                return redirect('/');
            }else{
                return redirect()->back()->with(['error'=>$responseBody['message']])->withInput();
            }   
        } else {
            return abort(500);
        } 
    }

    public function getForgotPassword(){
        return view('auth.forgotPassword');
    } 
    public function postForgotPassword(Request $request){
        $input = $request->input();
        $validator = Validator::make($input, [
            'email' => 'required|email',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $apiURL = $this->url.'/api/doctor/SendEmailResetPassword';
        $putInput = [
            'Email' => $input['email'],  
        ];      
        $client = new \GuzzleHttp\Client();
        try{
            $response = $client->request('PUT', $apiURL, ['form_params' => $putInput]);
        }catch(Exception $e){
            return abort(500);
        }
        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);
        if ($statusCode == 200) {
            if($responseBody['isSuccess']){
                session(['email' => $responseBody['data']['email'],'code'=>$responseBody['data']['code']]);
                 return redirect()->route('getEnterCode');
            }else{
                return redirect()->back()->with(['error'=>$responseBody['message']])->withInput();
            }   
        } else {
            return abort(500);
        } 

    }
    public function getEnterCode(){
        if(Session::has('code')){
            return view('auth.enterCode');
        }else{
            return abort(404);
        }
    }
    public function postEnterCode(Request $request){
        $input = $request->input();
        $validator = Validator::make($input, [
            'code' => 'required|integer|digits:4',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }  
        $email =Session()->get('email');
        $email = str_replace('@', '%40', $email);
        $apiURL = $this->url.'/api/doctor/ConfirmationCode?email='.$email;
        $postInput = [
            'confirmationCode' => $input['code'],  
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
                Session::flash('newcode', $input['code']);
                return redirect()->route('getRestPassword');
            }else{
                return redirect()->back()->with(['error'=>$responseBody['message']])->withInput();
            }   
        } else {
            return abort(500);
        } 
    }

    public function getResetPassword(){
        if(Session::has('newcode')){
            return view('auth.reset-password');
        }else{
            return abort(404);
        }
    } 
    public function postResetPassword(Request $request){
        $input = $request->input();
        $validator = Validator::make($input, [
            'password' => 'required|min:6|confirmed',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }   
        $email =Session()->get('email');
        $email = str_replace('@', '%40', $email);
        $apiURL = $this->url.'/api/doctor/ResetPassword?email='.$email;
        $postInput = [
            'NewPassword' => $input['password'],  
            'ConfirmNewPassword' => $input['password_confirmation'],  
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
                return redirect()->route('getPatientLogin')->with('success', 'Password Change successful!');
            }else{
                return redirect()->back()->with(['error'=>$responseBody['message']])->withInput();
            }   
        } else {
            return abort(500);
        } 
       
    }
    public function getChangePassword(){
        $userType = Session()->get('userType');
        $userType=lcfirst($userType);
        return view('auth.change-password',['userType'=>$userType]);
    }
    public function postChangePassword(Request $request){
        $input = $request->input();
        $validator = Validator::make($input, [
            'oldPassword' => 'required',
            'password' => 'required|confirmed', 
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $token = Session()->get('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        $apiURL = $this->url.'/api/doctor/changepassword';
        $putInput = [
            'OldPassword' =>  $input['oldPassword'],
            'NewPassword' => $input['password'],
            'ConfirmNewPassword' => $input['password_confirmation'],
        ];    
        $client = new \GuzzleHttp\Client();
        try{
            $response = $client->request('PUT', $apiURL, ['form_params' => $putInput,'headers' => $headers]);
        }catch(Exception $e){
            return abort(500);
        }
        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);
        if ($statusCode == 200) {
            if($responseBody['isSuccess']){
                return redirect()->back()->with(['success'=>$responseBody['message']]);
            }else{
                return redirect()->back()->with(['error'=>$responseBody['message']])->withInput();
            }   
        } else {
            return abort(500);
        } 
        
    }

    public function logout(){
        if(session()->has('user')){
          session()->forget(['user', 'api_token', 'userType']);
          return redirect()->route('getPatientLogin');
        }else{
            return redirect()->route('home');
        }
      }
    
} 