@extends('front.layouts.layout')
@section('title','Home')


@section('content')
    <!-- Home Banner -->
        <section class="section section-search background-image">
            <div class="container">
            <div class="banner-container">
                <div class="banner-left">
                <img src="{{asset('front/img/plus.png')}}" alt="Banner Image" class="banner-plus" />
                <h2 class="m-4">
                    Search <span style="color: #6ec7c3">Best Doctors</span>,
                    <span style="color: #6ec7c3">clincs </span> and Make an
                    Appointment
                </h2>
                <p class="m-4 fs-6" style="color: #858585">
                    After selecting the clinic, you can easily book an appointment
                    that suits your wishes
                </p>
                <div class="flex bg-white rounded-pill m-6 mt-12">
                    <div class="search-container rounded-pill">
                    <input type="search" class="form-control rounded-pill" placeholder="Search" />
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                    <button class="search-button rounded-pill">Search</button>
                    </div>
                </div>
                </div>
                <div class="banner-right d-flex justify-content-between">
                <img src="{{asset('front/img/lll 1.png')}}" alt="Banner Image" class="banner-image" />
                </div>
            </div>
            </div>
        </section>
    <!-- /Home Banner -->
  
    <!-- Clinic and Specialities -->
        <section class="section section-specialities">
            <div class="container-fluid">
            <div class="section-header text-center">
                <h2>Specialities</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9">
                <!-- Slider -->
                <div class="specialities-slider slider">
                    @foreach ($specialties as $item)
                    <!-- Slider Item -->
                    <div class="speicality-item text-center">
                    <div class="speicality-img">
                        <img src="{{$url.$item['image']}}" class="img-fluid" alt="Speciality" />
                    </div>
                    <p>{{$item['specialtyName']}}</p>
                    </div>
                    <!-- /Slider Item -->
                    @endforeach
                </div>
                <!-- /Slider -->
                </div>
            </div>
            </div>
    
        </section>
    <!-- Clinic and Specialities -->

    <!-- Popular Doctor Section -->
        <section class="section section-doctor">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5">
                <h2 class="pb-8">Top Doctors</h2>
                </div>
                <div class="doctor-slider slider">
                @foreach ($allDoctors as $doctor)
                <!-- Doctor Widget -->
                <div class="profile-widget">
                    <div class="doc-img">
                    <a href="{{route('doctorProfile',$doctor['doctorId'])}}">
                        <img class="img-fluid" alt="User Image" src="{{$url.$doctor['doctorImage']}}" />
                    </a>
                    <a href="javascript:void(0)" class="fav-btn">
                        <i class="far fa-bookmark"></i>
                    </a>
                    </div>
                    <div class="pro-content">
                    <h3 class="title">
                        <a href="{{route('doctorProfile',$doctor['doctorId'])}}">{{$doctor['doctorName']}}</a>
                    </h3>
                    <p class="speciality">
                        {{$doctor['specialityName']}}
                    </p>
                    <div class="rating-wrapper">
                        <div class="rating">
                        <i class="fas fa-star filled"></i>
                        <span class="d-inline-block average-rating">4.7</span>
                        </div>

                        <ul class="available-info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>Gaza,
                        </li>
                        </ul>
                    </div>
                    <div class="row row-sm">
                        <div class="col-6">
                        <a href="{{route('doctorProfile',$doctor['doctorId'])}}" class="btn view-btn">View Profile</a>
                        </div>
                        <div class="col-6">
                        <a href="booking.html" class="btn book-btn">Book Now</a>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- /Doctor Widget -->
                @endforeach
                </div>
            </div>
            </div>
        </div>
        </section>
    <!-- /Popular Doctor Section -->
  
    <!-- Availabe Features -->
    <section class="section section-features ">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-12">
            <img src="{{asset('front/img/pseudo2.png')}}" class="pseudo2-img" alt="Feature" />
            <div class="features-img">
              <img src="{{asset('front/img/doc-section-4.png')}}" class="img-fluid" alt="Feature" />
            </div>
          </div>
          <div class="col-lg-7 col-md-12">
            <div class="section-header">
              <h2 class="mt-2">4 easy steps to get your solution</h2>
              <p style="color:#6EC7C3" class="tops">
                How it Works
              </p>
              <div class="d-flex justify-content-center align-items-center pt-5">
                <div class="flex mt-0 me-2">
                  <img src="{{asset('front/img/person-search.png')}}" alt="" class="mr-3 align-self-start">
                  <div class="d-flex flex-column ps-3">
                    <h3>Search Doctor</h3>
                    <p>Lorem ipsum dolor consectetur adipiscing elit, tempor incididunt labore dolore magna aliqua.
                    </p>
                  </div>
                </div>
                <div class="flex mt-0">
                  <img src="{{asset('front/img/about/span.png')}}" alt="" class="mr-3 align-self-start">
                  <div class="d-flex flex-column ps-3">
                    <h3>Check Doctor Profile</h3>
                    <p>Lorem ipsum dolor consectetur
                      adipiscing elit, tempor incididunt
                      labore dolore magna aliqua.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
              <div class="flex mt-0  me-2">
                <img src="{{asset('front/img/about/Schedule.png')}}" alt="" class="mr-3 align-self-start">
                <div class="d-flex flex-column ps-3">
                  <h3>Schedule Appointment</h3>
                  <p>Lorem ipsum dolor consectetur
                    adipiscing elit, tempor incididunt
                    labore dolore magna aliqua.
                  </p>
                </div>
              </div>
              <div class="flex mt-0">
                <img src="{{asset('front/img/solution.png')}}" alt="" class="mr-3 align-self-start">
                <div class="d-flex flex-column ps-3">
                  <h3>Check Doctor Profile</h3>
                  <p>Lorem ipsum dolor consectetur
                    adipiscing elit, tempor incididunt
                    labore dolore magna aliqua.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Availabe Features -->
  
    <!-- Popular Blogs Section -->
      <section class="section section-doctor">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-center mb-5">
                <h2 class="pb-8">Blogs</h2>
  
              </div>
              <div class="doctor-slider slider">
                @foreach ($blogs as $blog)
                    <!-- Blog Widget -->
                    <div class="profile-widget">
                    <div class="doc-img">
                        <a href="doctor-profile.html">
                        <img class="img-fluid" alt="User Image" src="{{$url.$blog['blogImage']}}" />
                        </a>
                        <a href="javascript:void(0)" class="fav-btn">
                        <i class="far fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="pro-content">
                        <h3 class="title">
                        <a href="doctor-profile.html">{{$blog['title']}}
                        </a>
                        </h3>
                        <div class="nameAndTime">
                        <p class="speciality">
                            {{$blog['name']}}
                        </p>
                        <p class="speciality">
                            {{substr($blog['createdDate'],0,10)}}
                        </p>
                        </div>
    
                        <div>
                        <p class="nameAndTimeText">{{substr($blog['content'],0,100)}}</p>
                        </div>
                        <div class="row row-sm">
                        <div class="col-6">
                            <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- /Blog Widget -->
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Popular Blogs Section -->

    <!-- Frequently Asked Questions Section -->
 
    <section class="section section-features">
        <div class="section-header">
          <div class="text-index pb-5">
            <h2 class="mt-2">Frequently Asked Questions</h2>
            <p style="color:#6EC7C3">
              Get Your Answer
            </p>
          </div>
          <div class="container d-flex align-items-center">
            <div class="row ">
              <div class="col-lg-6 col-md-12">
                <div class="features-img">
                  <img src="{{asset('front/img/faq-img.png')}}" class="img-fluid" alt="Feature" />
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <div class="d-flex mt-0 flex-lg-row flex-md-column flex-sm-column justify-content-between">
                  <div class="container all-questions-wrapper">
                    <div class="row">
                      <div class="qusetion-wrapper">
                        <div class="question">
                          <span>How does the appointment booking process work on this platform ?</span>
                          <button class="btn btn-link arrow"><img src="{{asset('front/img/plus-icon.png')}}" /></button>
                        </div>
                        <div class="answer">
                          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem expedita ipsam
                            exercitationem, commodi a qui neque maxime praesentium, vel doloremque molestias nesciunt,
                            cupiditate ipsa ut!</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="qusetion-wrapper ">
                        <div class="question">
                          <span>Can I book appointments for different types of medical services ?
                          </span>
                          <button class="btn btn-link arrow"><img src="{{asset('front/img/plus-icon.png')}}" /></button>
                        </div>
                        <div class="answer">
                          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem expedita ipsam
                            exercitationem, commodi a qui neque maxime praesentium, vel doloremque molestias nesciunt,
                            cupiditate ipsa ut!</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="qusetion-wrapper ">
                        <div class="question">
                          <span>What information do I need to provide when booking an appointment?</span>
                          <button class="btn btn-link arrow"><img src="{{asset('front/img/plus-icon.png')}}" /></button>
                        </div>
                        <div class="answer">
                          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem expedita ipsam
                            exercitationem, commodi a qui neque maxime praesentium, vel doloremque molestias nesciunt,
                            cupiditate ipsa ut!</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="qusetion-wrapper">
                        <div class="question">
                          <span>Is my personal information secure when using this platform ?</span>
                          <button class="btn btn-link arrow"><img src="{{asset('front/img/plus-icon.png')}}" /></button>
                        </div>
                        <div class="answer">
                          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem expedita ipsam
                            exercitationem, commodi a qui neque maxime praesentium, vel doloremque molestias nesciunt,
                            cupiditate ipsa ut!</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="qusetion-wrapper">
                        <div class="question">
                          <span>Can I cancel or reschedule an appointment booked ?</span>
                          <button class="btn btn-link arrow"><img src="{{asset('front/img/plus-icon.png')}}" /></button>
                        </div>
                        <div class="answer">
                          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem expedita ipsam
                            exercitationem, commodi a qui neque maxime praesentium, vel doloremque molestias nesciunt,
                            cupiditate ipsa ut!</p>
                        </div>
                      </div>
                    </div>
                    <!-- تكرار السؤال والإجابة حسب الحاجة -->
                  </div>
                </div>
  
              </div>
            </div>
          </div>
        </div>
      </section>
   
    
    <!-- Frequently Asked Questions Section -->

    <!-- what our client says Section -->
      <section class="section section-doctor bg-img">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="clients-slider slider">
                <div class="slide client-slide">
                  <div class="slide-image">
                    <img src="{{asset('front/img/client-01.jpg.png')}}" alt="Image 1">
                  </div>
                  <div class="slide-content">
                    <div>
                      <h2>What Our Client Says</h2>
                      <p style="color: #6ec7c3">Testimonials</p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                      et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                      ea
                      commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                      fugiat nulla
                      pariatur.
                    </p>
                    <h5>John Doe <span style="color: #9CA3AF"> New York</span></h5>
                  </div>
                </div>    
                <div class="slide client-slide">
                  <div class="slide-image">
                    <img src="{{asset('front/img/client-01.jpg.png')}}" alt="Image 1">
                  </div>
                  <div class="slide-content">
                    <div>
                      <h2>What Our Client Says</h2>
                      <p style="color: #6ec7c3">Testimonials</p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                      et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                      ea
                      commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                      fugiat nulla
                      pariatur.
                    </p>
                    <h5>John Doe <span style="color: #9CA3AF"> New York</span></h5>
                  </div>
                </div>
                
  
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- what our client says Section -->

    <!-- start contact Us -->
      <div class="Download">
        <div class="container-Download">
          <img src="{{asset('front/img/about/download.png')}}" />
          <div class="discription-sec">
            <p>Be on Your Way to Feeling
  
              Better with the Doccure</p>
            <h1>Download the CliniPlus App today!</h1>
  
          </div>
  
        </div>
      </div>
    <!-- End Contact Us -->
@endsection