@extends('front.layouts.doctor-dashboard')
@section('title','Appointment')  
@section('content')

<div class="col-md-12 col-width-lg">
    <div class="appointments">
        @foreach ($patientAppointments as $patient)
        <!-- Appointment List -->
        <div class="appointment-list">
            <div class="profile-info-widget">
                <a href="patient-profile.html" class="booking-doc-img">
                    <img src="{{$url.$patient['patientImage']}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3><a href="patient-profile.html">{{$patient['patientName']}}</a></h3>
                    <div class="patient-details">
                        <h5><i class="far fa-clock"></i>{{$patient['date']}}, {{$patient['time']}}</h5>
                        <h5><i class="fas fa-map-marker-alt"></i> {{$patient['address']}}</h5>
                        <h5><i class="fas fa-envelope"></i> {{$patient['email']}}</h5>
                        <h5 class="mb-0"><i class="fas fa-phone"></i> +1 923 782 4575</h5>
                    </div>
                </div>
            </div>
            <div class="appointment-action">
                <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                    <i class="far fa-eye"></i> View
                </a>
              {{--   <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                    <i class="fas fa-check"></i> Accept
                </a>
                <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                    <i class="fas fa-times"></i> Cancel
                </a> --}}
            </div>
        </div>
        <!-- /Appointment List -->
        @endforeach
        
    </div>
</div>

@endsection