@extends('front.layouts.layout')
@section('title', 'Forgot Password')
@section('color','white')
@section('content')	
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <span>@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif</span>
                    <span>@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif</span>
                    <!-- Account Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('front/img/about/Forgot password.png')}}" class="img-fluid" alt="Login Banner">	
                            </div>
                            
                            <form action="{{route('postForgotPassword')}}" method="POST">
                            @csrf
                            <div class="form-controll login-right">
                                
                                <div class="login-header">
                                    <h3>Forgot Password?</h3>
                                    <p class="small text-muted">Don’t worry ! it happenes , please enter
                                        your email</p>
                                </div>
                                
                                <!-- Forgot Password Form -->
                                    <div class="form-group form-focus">
                                        <input name="email" type="email" class="form-control floating" value ={{old('email')}}>
                                        <label class="focus-label">Email</label>
                                    </div>
                                    <span>@error('email')<div class="text-danger">{{ $message }}</div>@enderror</span>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Submit</button>
                                </form>
                                <!-- /Forgot Password Form -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- /Account Content -->
                    
                </div>
            </div>

        </div>

    </div>		
    <!-- /Page Content -->
@endsection