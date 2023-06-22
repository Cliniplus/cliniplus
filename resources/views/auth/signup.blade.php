@extends('front.layouts.layout')
@section('title', $type .' Sign Up')
@section('color','white')

@section('content')
<!-- Page Content -->
<div class="content">
    <div class="container">
        <div class="row">
            <span>@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif</span>
            <span>@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif</span>
            <div class="col-md-12 col-lg-6">
                <div class="image-class">
                    <img src="{{asset('front/img/about/image (2) 1.png')}}" class="img" alt="Doccure Login">
                </div>
                @php
                $type1 = 'post'.$type.'Signup'
                @endphp
            </div>
            <div class="col-md-12 col-lg-6">
                <form method="post" action="{{route($type1)}}">
                    @csrf
                    <div class="form-controll form-edit-reg ">
                        <div class="login-flex">
                            <h3>{{$type}} Sign Up</h3>
                            @if($type == 'Doctor')
                                <a href="{{route('getPatientSignup')}}">
                                    <p>
                                    Are You a Patient ?
                                </p>
                                </a>
                                @else
                                <a href="{{route('getDoctorSignup')}}">
                                    <p>
                                    Are You a Doctor ?
                                </p>
                                </a>
                            @endif
                        </div>
                        <label class="focus-label">First Name</label>
                        <div class="form-group form-focus">
                            <input name="first_name" type="text" class="form-control floating">
                            <label class="focus-label">Enter your First Name</label>
                            <span>@error('first_name')<div class="text-danger">{{ $message }}</div>@enderror</span>
                        </div>
                        <label class="focus-label">Last Name</label>
                        <div class="form-group form-focus">
                            <input name="last_name" type="text" class="form-control floating">
                            <label class="focus-label">Enter your Last Name</label>
                            <span>@error('first_name')<div class="text-danger">{{ $message }}</div>@enderror</span>
                        </div>
                        <label class="focus-label">Email</label>
                        <div class="form-group form-focus">
                            <input name="email" type="email" class="form-control floating">
                            <label class="focus-label">Enter your Email</label>
                            <span>@error('email')<div class="text-danger">{{ $message }}</div>@enderror</span>
                        </div>
                        <label class="focus-label">Password</label>
                        <div class="form-group form-focus">
                            <input name="password" type="password" class="form-control floating">
                            <label class="focus-label">Enter your Password</label>
                            <span>@error('password')<div class="text-danger">{{ $message }}</div>@enderror</span>
                        </div>
                        <label class="focus-label">Confirm Password</label>
                        <div class="form-group form-focus">
                            <input name="password_confirmation" type="password" class="form-control floating">
                            <label class="focus-label">repeat your Password</label>
                            <span>@error('password_confirmation')<div class="text-danger">{{ $message }}</div>@enderror</span>

                        </div>
                        <p class="span-agree">
                            <span style="font-size: 15px;">
                                <input type="checkbox"> I agree to the 
                                <span style="color:#6EC7C3;">Terms of Service </span>and <span style="color:#6EC7C3;">Privacy Polciy</span>
                            </span>
                        </p>
                        <div class="text-right">
                            <a class="forgot-link" href="{{route('getForgotPassword')}}">Forgot Password ?</a>
                        </div>
                        <button class="private-btn" type="submit">Login</button>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>
                        <div class=" form-row social-login">
                            <a href="http://">
                                <button class="private-btn btn-new" type="button">
                                    <i class="fab fa-facebook-f mr-1"> Login with
                                    </i>Facebook</button>
                            </a>
                            <a href="http://">
                                <button class="private-btn btn-new" type="button">
                                    <i class="fab fa-google mr-1"></i>
                                    Login with Gmail
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
