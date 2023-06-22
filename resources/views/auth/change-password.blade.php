<?php
if(Session()->get('user')['userType'] == 'Doctor'){
    $layout = 'Front.layouts.doctor-dashboard';
}else{
    $layout = 'Front.layouts.patient-dashboard';
}
?>
@extends($layout)
@section('title','Change Password')  
@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <span>@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif</span>
        <span>@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif</span>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                    
                        <!-- Change Password Form -->
                        <form method="POST" action="{{route('postChangePassword')}}">
                            @csrf
                            <div class="form-group">
                                <label>Old Password</label>
                                <input name="oldPassword" type="password" class="form-control">
                                <span>@error('oldPassword')<div class="text-danger">{{ $message }}</div>@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input name="password" type="password" class="form-control">
                                <span>@error('password')<div class="text-danger">{{ $message }}</div>@enderror</span>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input name="password_confirmation" type="password" class="form-control">
                                <span>@error('password_confirmation')<div class="text-danger">{{ $message }}</div>@enderror</span>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                            </div>
                        </form>
                        <!-- /Change Password Form -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection