<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use GuzzleHttp\Client;


class DoctorController extends Controller
{
    private  $url;
    private  $img_url;

    public function __construct()
    {
      $this->url = config('constants.url');
      $this->img_url = url('/').config('constants.img_url');
    }

    public function index(){
        $patients = getRequest($this->url.'/api/doctor/GetMyPatient');
        $patientAppointments = getRequest($this->url.'/api/doctor/GetMyPatientAppointment');
        return view('front.doctor.index',['url'=>$this->img_url,'patients'=>$patients,'patientAppointments'=>$patientAppointments]);
    } 

    public function getAppointments(){
        $patientAppointments = getRequest($this->url.'/api/doctor/GetMyPatientAppointment');
        return view('front.doctor.appointments',['url'=>$this->img_url,'patientAppointments'=>$patientAppointments]);
    } 
     public function getMyPatient(){
        $myPatients = getRequest($this->url.'/api/doctor/GetAllPatients');
        return view('front.doctor.my-patients',['url'=>$this->img_url,'myPatients'=>$myPatients]);
    }  
    public function getCompleteDoctorProfile(){
        $specialties = getRequest($this->url.'/api/specialties/GetAllSpecialties');
        $data = getRequest($this->url.'/api/doctor/GetDoctorProfileById?doctorId='.Session()->get('user')['doctorId']);
        return view('front.doctor.doctor-profile-settings',['url'=>$this->img_url,'data'=>$data,'specialties'=>$specialties,]);
    } 
    public function postCompleteDoctorProfile(Request $request){
        $input = $request->input();
        $validator = Validator::make($input, [
            'firstName' => 'string',
            'lastName' => 'string',
            'gender' => 'required|date',
            'clinicName' => 'string',
            'clinicAddress' => 'string',
            'gender' => 'string',
            'from' => 'integer',
            'to' => 'integer',
            'awards_year' => 'integer',
            'registration_year' => 'integer',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        if ($input['rating_option'] == 'price_free') {
            $price = 'Free';
        } else {
            $price = $input['custom_rating_count'];
        }
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
        }
                
        $client = new Client();
        $apiURL = $this->url.'/api/doctor/CompleteDoctorProfile';
        $token = Session()->get('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $postInput = [
            'UserID' => Session()->get('user')['doctorId'],
            'AboutMe' => $input['biography'],
            'Pricing' => $price,
            'DoctorServices' => $input['services'],
            'Degree' => $input['degree'],
            'College' => $input['college'],
            'YearOfCompletion' => $input['year_of_completion'],
            'SpecialtyId' => $input['specialty'],
            'ClinicName' => $input['clinicName'],
            'ClinicAddress' => $input['clinicAddress'],
            'HospitalName' => $input['hospital'],
            'HospitalFrom' => $input['from'],
            'HospitalTo' => $input['to'],
            'Designation' => $input['designation'],
            'Awards' => $input['awards'],
            'AwardsYear' => $input['awards_year'],
            'Registration' => $input['registrations'],
            'RegistrationYear' => $input['registration_year'],
            'Membership' => $input['memberships'],
            'Gender' => $input['gender'],
            'DateOfBirth' => $input['dob'],
            'UserName' => $input['firstName'].' '.$input['lastName'],
            'PhoneNumber' => $input['phoneNumber'],
        ];
        
        $formData = [];
        foreach ($postInput as $key => $value) {
            $formData[] = [
                'name' => $key,
                'contents' => $value,
            ];
        }
        $image = UploadedFile::createFromBase($image); // Replace $image with your UploadedFile instance
        $formData[] = [
            'name' => 'Image',
            'contents' => fopen($image->getRealPath(), 'r'),
            'filename' => $image->getClientOriginalName(),
        ];
        
        try {
            $response = $client->request('POST', $apiURL, [
                'headers' => $headers,
                'multipart' => $formData,
            ]);
        } catch (Exception $e) {
            return abort(500);
        }
        
         
    } 
    public function getSocialmedia(){
        return view('front.doctor.social-media');
    }
    public function postSocialmedia(Request $request){
        $input = $request->input();
        $validator = Validator::make($input, [
            'facebook','twitter','instagram','linkedin','website'=> 'string',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        $token = Session()->get('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        $apiURL = $this->url.'/api/socialmediaurl/AddSocialMediaURL';
        $postInput = [
            'FacebookUrl' =>  $input['facebook'],
            'TwitterUrl' => $input['twitter'],
            'InstagramUrl' => $input['instagram'],
            'LinkedInUrl' => $input['linkedin'],
            'WebsiteUrl' => $input['website']
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
                return redirect()->back()->with(['success'=>$responseBody['message']]);
            }else{
                return redirect()->back()->with(['error'=>$responseBody['message']])->withInput();
            }   
        } else {
            return abort(500);
        } 
    }
    
     public function getScheduleTime(){
        return view('front.doctor.schedule-time');
    } 
     public function postScheduleTime(Request $request){
        $input = $request->input();
        $validator = Validator::make($input, [
            'duration' => 'required|int',
            'date' => 'required|date',
            'from' => 'required',
            'to' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $day = Carbon::createFromFormat('Y-m-d', $input['date'])->format('l');
        $token = Session()->get('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        $apiURL = $this->url.'/api/scheduletiming/addscheduletiming';
        $postInput = [
            'DurationTime' =>  $input['duration'],
            'Date' => $input['date'],
            'StartTime' => $input['from'],
            'EndTime' => $input['to'],
            'Day' => $day,
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
                return redirect()->back()->with(['success'=>$responseBody['message']]);
            }else{
                return redirect()->back()->with(['error'=>$responseBody['message']])->withInput();
            }   
        } else {
            return abort(500);
        } 
    } 
  
    public function doctorProfile($id){
        $specialties = getRequest($this->url.'/api/specialties/GetAllSpecialties');
        $doctor = getRequest($this->url.'/api/doctor/GetDoctorProfileById?doctorId='.$id);
        $reviews = getRequest($this->url.'/api/review/GetAllReviewsForDoctor?doctorId='.$id);
        $businessHours = getRequest($this->url.'/api/scheduletiming/getBusinessHoursForDoctor?doctorId='.$id);
        return view('front.doctor.profile',['url'=>$this->img_url,'doctor'=>$doctor,'specialties'=>$specialties,'reviews'=>$reviews,'id'=>$id,'businessHours'=>$businessHours]);
    }    
    public function getDoctorChat(){
        return view('front.doctor.chat');
    }  
    public function postDoctorChat(){
        return view('front.doctor.profile',['url'=>$this->img_url]);
    } 
     public function getReview(){

        $reviews = getRequest($this->url.'/api/review/GetAllReviewsForDoctor?doctorId='.Session()->get('user')['doctorId']);
        return view('front.doctor.review',['url'=>$this->img_url,'reviews'=>$reviews]);
    } 
   
}
