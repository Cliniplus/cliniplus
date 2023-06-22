@extends('front.layouts.doctor-dashboard')
@section('title','Dashboard')  
@section('content')

<div class="col-md-7 col-width-lg col-xl-9">
    <div class="row">
        <div class="col-md-12">
            <div class="card dash-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget dct-border-rht">
                                <div class="circle-bar circle-bar1">
                                    <div class="circle-graph1" data-percent="75">
                                        <img src="{{asset('front/img/icon-01.png')}}" class="img-fluid"
                                            alt="patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Total Patient</h6>
                                    <h3>{{count($patients)}}</h3>
                                    <p class="text-muted">Till Today</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget dct-border-rht">
                                <div class="circle-bar circle-bar2">
                                    <div class="circle-graph2" data-percent="65">
                                        <img src="{{asset('front/img/icon-02.png')}}" class="img-fluid"
                                            alt="Patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Today Patient</h6>
                                    <h3>160</h3>
                                    <p class="text-muted">06, Nov 2019</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget">
                                <div class="circle-bar circle-bar3">
                                    <div class="circle-graph3" data-percent="50">
                                        <img src="{{asset('front/img/icon-03.png')}}" class="img-fluid"
                                            alt="Patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Appoinments</h6>
                                    <h3>{{count($patientAppointments)}}</h3>
                                    <p class="text-muted">06, Apr 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- --------------------------- -->
    <!-- <div class="col-md-7 col-lg-8 col-xl-9"> -->
    <div class="card">
        <div class="card-body pt-0">

            <!-- Tab Menu -->
            <nav class="user-tabs mb-4">
                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Manage
                            Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pat_billing" data-toggle="tab">invoices</a>
                    </li>
                </ul>
            </nav>
            <!-- /Tab Menu -->

            <!-- Tab Content -->
            <div class="tab-content pt-0">

                <!-- Appointment Tab -->
                <div id="pat_appointments" class="tab-pane fade show active">
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="appointments">
                                @foreach ($patientAppointments as $patient)
                                <!-- Appointment List -->
                                <div class="appointment-list">
                                    <div class="profile-info-widget">
                                        <a href="" class="booking-doc-img">
                                            <img src="{{$url.$patient['patientImage']}}"
                                                alt="User Image">
                                        </a>
                                        <div class="profile-det-info">
                                            <h3><a href="">{{$patient['patientName']}}</a>
                                            </h3>
                                            <div class="patient-details">
                                                <h5><i class="far fa-clock"></i> {{$patient['date']}}, {{$patient['time']}} </h5>
                                                <h5><i class="fas fa-map-marker-alt"></i>{{$patient['address']}} </h5>
                                                <h5><i class="fas fa-envelope"></i>{{$patient['email']}}</h5>
                                                <h5 class="mb-0"><i class="fas fa-phone"></i> +1 923
                                                    782 4575</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="appointment-action">
                                        <a href="#" class="btn btn-sm bg-info-light"
                                            data-toggle="modal" data-target="#appt_details">
                                            <i class="far fa-eye"></i> View
                                        </a>
                                     
                                    </div>
                                </div>
                                <!-- /Appointment List -->
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>



                <!-- Medical Records Tab -->
                <div id="pat_medical_records" class="tab-pane fade">
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date </th>
                                            <th>Description</th>
                                            <th>Attachment</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0010</a></td>
                                            <td>14 Nov 2019</td>
                                            <td>Dental Filling</td>
                                            <td><a href="#">dental-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html"
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/doctors/doctor-thumb-01.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Ruby Perrin
                                                        <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0009</a></td>
                                            <td>13 Nov 2019</td>
                                            <td>Teeth Cleaning</td>
                                            <td><a href="#">dental-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html"
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/doctors/doctor-thumb-02.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Darren Elder
                                                        <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0008</a></td>
                                            <td>12 Nov 2019</td>
                                            <td>General Checkup</td>
                                            <td><a href="#">cardio-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html"
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/doctors/doctor-thumb-03.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Deborah Angel
                                                        <span>Cardiology</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0007</a></td>
                                            <td>11 Nov 2019</td>
                                            <td>General Test</td>
                                            <td><a href="#">general-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html"
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/doctors/doctor-thumb-04.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Sofia Brient
                                                        <span>Urology</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0006</a></td>
                                            <td>10 Nov 2019</td>
                                            <td>Eye Test</td>
                                            <td><a href="#">eye-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html"
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/doctors/doctor-thumb-05.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Marvin
                                                        Campbell <span>Ophthalmology</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0005</a></td>
                                            <td>9 Nov 2019</td>
                                            <td>Leg Pain</td>
                                            <td><a href="#">ortho-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html"
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/doctors/doctor-thumb-06.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Katharine
                                                        Berthold <span>Orthopaedics</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0004</a></td>
                                            <td>8 Nov 2019</td>
                                            <td>Head pain</td>
                                            <td><a href="#">neuro-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html"
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/doctors/doctor-thumb-07.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Linda Tobin
                                                        <span>Neurology</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0003</a></td>
                                            <td>7 Nov 2019</td>
                                            <td>Skin Alergy</td>
                                            <td><a href="#">alergy-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html"
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/doctors/doctor-thumb-08.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Paul Richard
                                                        <span>Dermatology</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0002</a></td>
                                            <td>6 Nov 2019</td>
                                            <td>Dental Removing</td>
                                            <td><a href="#">dental-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html"
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/doctors/doctor-thumb-09.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. John Gibbs
                                                        <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0001</a></td>
                                            <td>5 Nov 2019</td>
                                            <td>Dental Filling</td>
                                            <td><a href="#">dental-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html"
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/doctors/doctor-thumb-10.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Olga Barlow
                                                        <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Medical Records Tab -->





















                <!-- Billing Tab -->
                <div id="pat_billing" class="tab-pane fade">
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Invoice Table -->

                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Invoice No</th>
                                            <th>Patient</th>
                                            <th>Amount</th>
                                            <th>Paid On</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="">#INV-0010</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href=""
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/patients/patient.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="">Richard Wilson
                                                        <span>#PT0016</span></a>
                                                </h2>
                                            </td>
                                            <td>$450</td>
                                            <td>14 Nov 2019</td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href=""
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="">#INV-0009</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href=""
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/patients/patient1.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="">Charlene Reed
                                                        <span>#PT0001</span></a>
                                                </h2>
                                            </td>
                                            <td>$200</td>
                                            <td>13 Nov 2019</td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href=""
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="">#INV-0008</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href=""
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/patients/patient2.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="">Travis Trimble
                                                        <span>#PT0002</span></a>
                                                </h2>
                                            </td>
                                            <td>$100</td>
                                            <td>12 Nov 2019</td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href=""
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="">#INV-0007</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href=""
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/patients/patient3.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="">Carl Kelly
                                                        <span>#PT0003</span></a>
                                                </h2>
                                            </td>
                                            <td>$350</td>
                                            <td>11 Nov 2019</td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href=""
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="">#INV-0006</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href=""
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/patients/patient4.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="">Michelle Fairfax
                                                        <span>#PT0004</span></a>
                                                </h2>
                                            </td>
                                            <td>$275</td>
                                            <td>10 Nov 2019</td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href=""
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="">#INV-0005</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href=""
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/patients/patient5.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="">Gina Moore
                                                        <span>#PT0005</span></a>
                                                </h2>
                                            </td>
                                            <td>$600</td>
                                            <td>9 Nov 2019</td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href=""
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="">#INV-0004</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href=""
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/patients/patient6.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="">Elsie Gilley
                                                        <span>#PT0006</span></a>
                                                </h2>
                                            </td>
                                            <td>$50</td>
                                            <td>8 Nov 2019</td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href=""
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="">#INV-0003</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href=""
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/patients/patient7.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="">Joan Gardner
                                                        <span>#PT0007</span></a>
                                                </h2>
                                            </td>
                                            <td>$400</td>
                                            <td>7 Nov 2019</td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href=""
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="">#INV-0002</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href=""
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/patients/patient8.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="">Daniel Griffing
                                                        <span>#PT0008</span></a>
                                                </h2>
                                            </td>
                                            <td>$550</td>
                                            <td>6 Nov 2019</td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href=""
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="">#INV-0001</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href=""
                                                        class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{asset('front/img/patients/patient9.jpg')}}"
                                                            alt="User Image">
                                                    </a>
                                                    <a href="">Walter Roberson
                                                        <span>#PT0009</span></a>
                                                </h2>
                                            </td>
                                            <td>$100</td>
                                            <td>5 Nov 2019</td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href=""
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Billing Tab -->

            </div>
            <!-- Tab Content -->

        </div>
    </div>


@endsection