@extends('front.layouts.layout')
@section('title','blogs')
@section('content')

<!-- Page Content -->
<div class="content">
    <div class="container">

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="booking-doc-info">
                            <a href="" class="booking-doc-img">
                                <img src="{{asset('front/img/doctor-thumb-06.jpg')}}" alt="User Image">
                            </a>
                            <div class="booking-info">
                                <h4><a href="doctor-profile.html">Dr. Darren Elder</a></h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">35</span>
                                </div>
                                <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA
                                </p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center p-3">
                            <p>Working Hours from<strong>09:00 AM </strong> to <strong>03:00 PM</strong></p>
                        </div>
                    </div>
                    <div>
                        <div class="container">
                            <div class="mb-3 d-flex align-items-center justify-content-between pt-5 pb-3">
                                <label for="searchInput" >Appointments : </label>
                                <input type="date" class="form-control ss" id="searchInput" placeholder=""
                                    onkeyup="searchButtons()">
                            </div>
                        
                            <div id="buttonsContainer" class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2" type="button">4:30 AM - 1:00 AM</button>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2" type="button">1:30 AM - 4:00 AM</button>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2" type="button">2:30 AM - 3:00 AM</button>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2" type="button">9:30 AM - 9:00 AM</button>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2" type="button">11:37 AM - 08:00 AM</button>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2"  type="button">11:30 AM - 10:00 AM</button>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2" type="button">9:11 AM - 10:00 AM</button>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2" type="button">9:55 AM - 10:00 AM</button>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2" type="button">5:55 AM - 10:00 AM</button>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2" type="button">5:30 AM - 10:00 AM</button>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2" type="button">2:30 AM - 05:00 AM</button>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-primary me-md-2 my-2" type="button">7:30 AM - 06:00 AM</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                

                <!-- Submit Section -->
                <div class="submit-section proceed-btn text-right">
                    <a href="checkout.html" class="btn btn-primary submit-btn">Proceed to Pay</a>
                </div>
                <!-- /Submit Section -->

            </div>
        </div>
    </div>

</div>
<!-- /Page Content -->
@endsection