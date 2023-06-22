<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private  $url;
    private  $img_url;

    public function __construct()
    {
      $this->url = config('constants.url');
      $this->img_url = url('/').config('constants.img_url');
    }

    public function index(){
      $patients = getRequest($this->url.'/api/admin/GetAllPatients');
      $doctors = getRequest($this->url.'/api/admin/GetAllDoctors');
      $appointments = getRequest($this->url.'/api/admin/GetAllAppointment');
        return view('admin.index',['url'=>$this->img_url,'patients'=>$patients,'doctors'=>$doctors,'appointments'=>$appointments]);
    }  
     public function getAppointments(){
      $appointments = getRequest($this->url.'/api/admin/GetAllAppointment');
        return view('admin.appointment-list',['url'=>$this->img_url,'appointments'=>$appointments]);
    }  
     public function getDoctors(){
      $doctors = getRequest($this->url.'/api/admin/GetAllDoctors');
        return view('admin.doctor-list',['url'=>$this->img_url,'doctors'=>$doctors]);
    }  
     public function getPatients(){
      $patients = getRequest($this->url.'/api/admin/GetAllPatients');
        return view('admin.patient-list',['url'=>$this->img_url,'patients'=>$patients]);
    } 
      public function getReviews(){
        return view('admin.reviews');
    } 
      public function getSettings(){
        return view('admin.settings');
    }  
     public function getInvoices(){
        return view('admin.invoice-report');
    } 
      public function getProfile(){
        return view('admin.profile');
    } 
 
}
