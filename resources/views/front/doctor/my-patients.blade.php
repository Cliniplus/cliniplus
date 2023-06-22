@extends('front.layouts.doctor-dashboard')
@section('title','My Patients')  
@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
						
    <div class="row row-grid">
        @foreach ($myPatients as $patient)
        <div class="col-md-12 col-width-lg">
            <div class="card widget-profile pat-widget-profile">
                <div class="card-body">
                    <div class="pro-widget-content">
                        <div class="profile-info-widget">
                            <a href="" class="booking-doc-img">
                                <img src="{{$url.$patient['patientImage']}}" alt="User Image">
                            </a>
                            <div class="profile-det-info">
                                <h3><a href="patient-profile.html">{{$patient['patientName']}}</a></h3>
                                
                                <div class="patient-details">
                                    <h5><b>Patient ID :</b> P0016</h5>
                                    <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Alabama, USA</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="patient-info">
                        <ul>
                            <li>Phone <span>+1 952 001 8563</span></li>
                            <li>Age <span>38 Years, Male</span></li>
                            <li>Blood Group <span>{{$patient['bloodGroup']}}+</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>   
        @endforeach
     
  
    </div>

</div>
@endsection