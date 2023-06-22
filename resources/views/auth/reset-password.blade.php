@extends('front.layouts.layout')
@section('title', 'Reset Password')
@section('color','white')
@section('content')
    <!-- Main Wrapper -->
    <div class="main-wrapper">
		
        <!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<span>@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif</span>
							<span>@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif</span>
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="{{asset('front/img/about/image (2) 1.png')}}" class="img" alt="Doccure Login">	
									</div>
									
									<form method="POST" action="{{route('postResetPassword')}}" >
										@csrf
										<div class="form-controll login-reset" >
											<div class="login-header">
												<h3>Reset Password ?</h3>
											</div>
											<label class="focus-label">New Password</label>
											<div class="form-group form-focus">
												<input name ="password" type="password" class="form-control floating">
												<label class="focus-label">write your Password</label>
												<span>@error('password')<div class="text-danger">{{ $message }}</div>@enderror</span>
											</div>
											<label class="focus-label">Confirm New Password</label>
											<div class="form-group form-focus">
												<input name ="password_confirmation" type="password" class="form-control floating">
												<label class="focus-label">Confirm your Password</label>
												<span>@error('password_confirmation')<div class="text-danger">{{ $message }}</div>@enderror</span>
											</div>
                                            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>

											
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->   
		</div>
<!-- /Main Wrapper -->
@endsection