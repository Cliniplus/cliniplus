@extends('front.layouts.layout')
@section('title','About Us')
@section('content') 
 <!-- About Us Section  -->


 <div class="about">
  <div class="main-heading">
    <h2 class="fw-bold py-4">About Us</h2>
  </div>
</div>

<div class="">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="image-container">
          <div class="box">
            <div class="box1">
              <img src="{{asset('front/img/about/image1.png')}}">
              <img src="{{asset('front/img/about/Rectangle 442.png')}}">
            </div>
            <div class="image1">
              <div class="rectangle">
                <h3>Over 25+ Years
                  Experience</h3>
              </div>
              <div class="rect-img none">
                <img src="{{asset('front/img/about/Rectangle 441.png')}}">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="">
          <h1 class="topmar">We Are Always Ensure Best
            Medical Treatment For Your
            Health</h1>
          <h5 class="colors pb-2">About Our Platform</h5>

          <p class="text-secondary styles">We are an advanced platform designed to revolutionize
            the way doctors and patients communicate and manage appointments.
            With our seamless online booking system, we aim to simplify the process of scheduling appointments, with
            a
            user-friendly interface that allows you to search for and book healthcare professionals based on various
            criteria
            while providing effective tools to physicians to streamline their processes and manage their practices
            efficiently.
          </p>

          <div class="new d-flex justify-content-start align-items-center py-3">
            <div class="cicle">
              <i class="fa-solid fa-phone-volume text-white" aria-hidden="true"></i>
            </div>
            <div class="ps-2">
              <p>Need Emergency?</p>
              <h4 class="fw-bold top-top">+1 315 369 5943 </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Start Features -->


<div class="features py-5">
  <h2 class="choose fw-bold">Why Choose Us ?</h2>
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-12">
        <div class="feat">
          <div class="cicle">
            <i class="fa fa-user-md" aria-hidden="true"></i>
          </div>
          <h4>Qualified Staff of Doctors</h4>
          <p>The platform contains the most
            qualified and experienced
            doctors</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-12">
        <div class="feat">
          <div class="cicle">
            <i class=" fas fa-calendar"></i>
          </div>
          <h4>Easily book an appointment</h4>
          <p>Lour easy booking system allows
            you to easily schedule your
            appointment with just
            a few clicks</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-12">
        <div class="feat">
          <div class="cicle">
            <i class="fa fa-paper-plane"></i>
          </div>
          <h4> appointment reminders</h4>
          <p>Communicate directly with your
            patients, ensuring smooth
            coordination It reduces
            no-shows</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-12">
        <div class="feat">
          <div class="cicle">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
          </div>
          <h4>Simplify operations</h4>
          <p> provides a central hub where you can easily manage your appointments,
            view patient details,
            and optimize your schedule.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Features -->
<!-- start contact Us -->
<div class="contact-us">
<div class="container">
  <img src="{{asset('front/img/about/image3.png')}}" />
  <div class="discription-sec">
    <h2>Be on Your Way to Feeling
      Better with the Doccure</h2>
    <p>The best solution is offered to you, to earn the best services and to facilitate all booking operations</p>
    <button class="btn">Contact With Us</button>
  </div>

</div>
</div>
<!-- End Contact Us -->



@endsection