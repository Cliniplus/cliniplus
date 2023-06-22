@extends('front.layouts.layout')
@section('title', $type .' Login')
@section('color','white')

@section('content')
	<!-- Page Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <span>@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif</span>
                <span>@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif</span>
                <div class="col-md-12 col-lg-6">
                    <div>
                        <div class="image-class">
                            <img src="{{asset('front/img/about/image (2) 1.png')}}" class="img" alt="Doccure Login">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <form method="POST" action="{{route('postLogin')}}">
                        @csrf
                        <div class="form-controll form-edit">
                            <div class="login-flex">
                                <h3>{{$type}} Login</h3>
                                @if($type == 'Doctor')
                                <a href="{{route('getPatientLogin')}}">
                                    <p>
                                    Are You a Patient ?
                                </p>
                                </a>
                                @else
                                <a href="{{route('getDoctorLogin')}}">
                                    <p>
                                    Are You a Doctor ?
                                </p>
                                </a>
                                @endif
                            </div>
                            <label class="focus-label">Email</label>
                            <div class="form-group form-focus">
                                <input name="email" type="email" class="form-control floating">
                                <label class="focus-label">write your Email</label>
                                <span>@error('email')<div class="text-danger">{{ $message }}</div>@enderror</span>
                            </div>
                            <label class="focus-label">Password</label>
                            <div class="form-group form-focus">
                                <input name="password" type="password" class="form-control floating">
                                <label class="focus-label">write your Password</label>
                                <span>@error('password')<div class="text-danger">{{ $message }}</div>@enderror</span>
                            </div>
                            <div class="text-right">
                                <a class="forgot-link" href="{{route('getForgotPassword')}}">Forgot Password ?</a>
                            </div>
                            <button class="private-btn" type="submit">Login</button>
                            <div class="text-center dont-have">Don’t have an account? <a
                                    href="{{route('getPatientSignup')}}">Signup</a>
                            </div>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection