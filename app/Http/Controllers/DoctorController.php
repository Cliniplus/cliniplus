<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Contracts\Session\Session;


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
            'gender' => 'string',
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
            $originalName = $image->getClientOriginalName();
        }
    

        $apiURL = $this->url.'/api/doctor/CompleteDoctorProfile';
        $token = Session()->get('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->request('POST', $apiURL, [
                'multipart' => [
                    [
                        'name' => 'UserID',
                        'contents' => Session()->get('user')['doctorId']
                    ],
                    [
                        'name' => 'AboutMe',
                        'contents' => $input['biography']
                    ],
                    [
                        'name' => 'SpecialtyName',
                        'contents' => $input['specialty']
                    ],   
                    [
                        'name' => 'Pricing',
                        'contents' => $price
                    ],
                    [
                        'name' => 'DoctorServices',
                        'contents' => $input['services']
                    ],
                    [
                        'name' => 'Degree',
                        'contents' => $input['degree'], 
                    ],  
                    [
                        'name' => 'College',
                        'contents' => $input['college'], 
                    ],  
                    [
                        'name' => 'YearOfCompletion',
                        'contents' => $input['specialty']
                    ],  
                    [
                        'name' => 'ClinicName',
                        'contents' => $input['clinicName']
                    ],
                    [
                        'name' => 'ClinicAddress',
                        'contents' => $input['clinicAddress']
                    ],  
                    [
                        'name' => 'HospitalName',
                        'contents' => $input['hospital']
                    ],
                    [
                        'name' => 'HospitalFrom',
                        'contents' => $input['from']
                    ], 
                    [
                        'name' => 'HospitalTo',
                        'contents' => $input['to']
                    ], 
                    [
                        'name' => 'Designation',
                        'contents' => $input['designation']
                    ], 
                    [
                        'name' => 'Awards',
                        'contents' => $input['awards']
                    ], 
                    [
                        'name' => 'AwardsYear',
                        'contents' => $input['awards_year']
                    ],
                    [
                        'name' => 'Registration',
                        'contents' => $input['registrations']
                    ], 
                    [
                        'name' => 'RegistrationYear',
                        'contents' => $input['registration_year']
                    ],  
                    [
                        'name' => 'Membership',
                        'contents' => $input['memberships']
                    ], 
                    [
                        'name' => 'Gender',
                        'contents' => $input['gender']
                    ], 
                    [
                        'name' => 'DateOfBirth',
                        'contents' => $input['dob']
                    ],  
                    [
                        'name' => 'UserName',
                        'contents' => $input['firstName'].' '.$input['lastName']
                    ],    
                    [
                        'name' => 'PhoneNumber',
                        'contents' => $input['phoneNumber']
                    ],  
                    [ 
                        'name' => 'ImageFile',
                        'contents' => fopen($image->getPathname(), 'r')  // Open the image file
                    ],  
                    [ 
                        'name' => 'Image',
                        'contents' => $originalName  // Open the image file
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
                return redirect()->route('getCompleteDoctorProfile')->with('success', 'Profile Complete successful!');
            } else {
                return redirect()->back()->with(['error' => $responseBody['message']])->withInput();
            }
        } else {
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
        $chatList = getRequest($this->url.'/chat/GetListChat');
        return view('front.doctor.chat',['url'=>$this->img_url,'chatList'=>$chatList]);
        
    } 
    public function doctorChat(Request $request){
        $id = $request->query('id');
        $doctor = $request->query('doctor');
        $image = $request->query('image');
        $chatList = getRequest($this->url.'/chat/GetChatMassage?uId='.$id); 
        ?>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="chat-header">
            <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                <i class="material-icons">chevron_left</i>
            </a> 
            <div class="chat-new d-flex justify-content-bettwen align-items-center">
                <div class="chat-img">
                    <img src="<?php echo $this->url.$image; ?>" alt="User Image" class="avatar-img rounded-circle">
                </div>
                <div class="d-flex justify-content-bettwen align-items-center  ">
                    <div class="ps-2">
                        <div class="user-name fw-bold fs-7"><?php echo $doctor ?></div>
                        <div class="user-last-chat fsize">Online </div>
                    </div>
                </div>
            </div>
            <div class="chat-options">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#voice_call">
                    <i class="material-icons">local_phone</i>
                </a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#video_call">
                    <i class="material-icons">videocam</i>
                </a>
                <a href="javascript:void(0)">
                    <i class="material-icons">more_vert</i>
                </a>
            </div>
        </div>
        <div class="chat-body">
            <div class="chat-scroll">
                <ul class="list-unstyled">
                    <?php foreach ($chatList as $item) : ?>
                    <?php 
                    if($item['senderName'] == Session()->get('user')['fullName'] ){
                        $receiver_id = $item['receiverUserId'];
                        ?> 
                            <li class="media sent">
                                <div class="media-body">
                                    <div class="msg-box">
                                        <div>
                                            <p><?php echo $item['message']?></p>
                                            <ul class="chat-msg-info">
                                                <li>
                                                    <div class="chat-time">
                                                        <span><?php echo Carbon::createFromFormat('h:i:s A d/m/Y', $item['sentAt'])->diffForHumans() ?></span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php
                }else{
                    $receiver_id = $item['senderUserId'];
                    ?>
                        <li class="media received">
                            <div class="avatar">
                                <img src="<?php echo $this->url.$image; ?>" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="media-body">
                                <div class="msg-box">
                                    <div>
                                        <p><?php echo $item['message']?></p>
                                        
                                        <ul class="chat-msg-info">
                                            <li>
                                                <div class="chat-time">
                                                    <span><?php echo Carbon::createFromFormat('h:i:s A d/m/Y', $item['sentAt'])->diffForHumans() ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                               
                            </div>
                        </li>
                    <?php        
                }
                
                ?> 
 
                   
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
            <div class="chat-footer">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="btn-file btn">
                            <i class="fa fa-paperclip"></i>
                            <input type="file">
                        </div>
                    </div>
                    <input id="messageInput" name="message" type="text" class="input-msg-send form-control" data-id="<?php echo $receiver_id ?>" data-url="<?php echo route('postDoctorChat')?>"
                        placeholder="Type something">
                    <div class="input-group-append">
                        <button onclick="send_message()" type="button" class="btn msg-send-btn" data-id="<?php echo $receiver_id ?>" data-url="<?php echo route('postDoctorChat')?>"><i
                                class="fab fa-telegram-plane"></i></button>
                    </div>
                </div>
            </div>
            <script>
                var messageInput = document.getElementById('messageInput');

                messageInput.addEventListener('keypress', function(event) {
                    if (event.key === 'Enter') {

                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    var message = event.target.value; 
                    var urlx = $(".input-msg-send").attr("data-url");
				    var id = $(".input-msg-send").attr("data-id");
                    $.ajax({
					type: "POST",
					data: { id: id,message:message },
					url: urlx,
                    beforeSend: function(xhr) {
                        // Set the CSRF token in the request header
                        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                    },
					success: function (data) {
					},
				});
                event.target.value = ''; 
				return false;
                   
                }
                });
            </script>

            <script>
               
                function send_message(){

			    var csrfToken = $('meta[name="csrf-token"]').attr('content');

				var urlx = $(".msg-send-btn").attr("data-url");
				var id = $(".msg-send-btn").attr("data-id");
			    var message = document.getElementById('messageInput').value;

                $.ajax({
					type: "POST",
					data: { id: id,message:message },
					url: urlx,
                    beforeSend: function(xhr) {
                        // Set the CSRF token in the request header
                        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                    },
					success: function (data) {
					},
				});
				return false;
			    }
            </script>
    <?php
    }
    public function postDoctorChat(Request $request){
        $id = $request->input('id');
        $message = $request->input('message');
        $token = Session()->get('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        $apiURL = $this->url.'/chat/sendmessage';
        $postInput = [
            'ReceiverUserId' =>  $id,
            'Message' => $message,
        ];    
        $client = new \GuzzleHttp\Client();
        try{
            $response = $client->request('POST', $apiURL, ['form_params' => $postInput,'headers' => $headers]);
        }catch(Exception $e){
            return abort(500);
        }
       
   

    } 
     public function getReview(){

        $reviews = getRequest($this->url.'/api/review/GetAllReviewsForDoctor?doctorId='.Session()->get('user')['doctorId']);
        return view('front.doctor.review',['url'=>$this->img_url,'reviews'=>$reviews]);
    } 
   
}
