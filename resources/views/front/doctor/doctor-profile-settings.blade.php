@extends('front.layouts.doctor-dashboard')
@section('title','Profile Settings')  
@section('content')
<div class="col-md-7 col-width-lg col-xl-9">
    <span>@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif</span>
    <span>@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif</span>
    <form method="POST" action="{{route('postCompleteDoctorProfile')}}" enctype="multipart/form-data">		
        @csrf	
        <!-- Basic Information -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Information</h4>
                <div class="row form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{$url.$data[0]['doctorImage']}}" alt="User Image">
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input name="image" type="file" class="upload">
                                    </div>
                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username <span class="text-danger">*</span></label>
                            <input value="{{$data[0]['fullName']}}" name ="userName" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input value="{{$data[0]['email']}}" name ="email" type="email" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input value="{{explode(" ", $data[0]['fullName'])[0]}}" name="firstName" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name <span class="text-danger">*</span></label>
                            <input value="{{explode(" ", $data[0]['fullName'])[1]}}" name="lastName" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input name="phoneNumber" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control select">
                                <option>Select</option>
                                <option @if($data[0]['gender'] == "Male") selected @endif value="male">Male</option>
                                <option @if($data[0]['gender'] == "Female") selected @endif value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12   ">
                        <div class="form-group mb-0">
                            <label>Date of Birth</label>
                            <input name="dob" type="date" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Basic Information -->
        
        <!-- About Me -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">About Me</h4>
                <div class="form-group mb-0">
                    <label>Biography</label>
                    <textarea name="biography" class="form-control" rows="5">{{$data[0]['aboutMe']}}</textarea>
                </div>
            </div>
        </div>
        <!-- /About Me -->
        
        <!-- Clinic Info -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Clinic Info</h4>
                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Clinic Name</label>
                            <input value="{{$data[0]['clinicName']}}" name="clinicName" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Clinic Address</label>
                            <input value="{{$data[0]['clinicAddress']}}" name="clinicAddress" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Clinic Info -->

        {{--     <!-- Contact Details -->
        <div class="card contact-card">
            <div class="card-body">
                <h4 class="card-title">Contact Details</h4>
                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input name="line1" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Address Line 2</label>
                            <input name="line2" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">City</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">State / Province</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Country</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Postal Code</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Contact Details --> --}}
        
        <!-- Pricing -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pricing</h4>
            
                <div class="form-group mb-0">
                    <div id="pricing_select">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="price_free" name="rating_option" class="custom-control-input" value="price_free" @if($data[0]['pricing'] == 'Free') checked @endif>
                            <label class="custom-control-label" for="price_free">Free</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="price_custom" name="rating_option" value="custom_price" class="custom-control-input" @if($data[0]['pricing'] != 'Free') checked @endif>
                            <label class="custom-control-label" for="price_custom">Custom Price (per hour)</label>
                        </div>
                    </div>

                </div>
                
                <div class="row custom_price_cont" id="custom_price_cont" style="display: none;">
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="custom_rating_input" name="custom_rating_count" value="{{$data[0]['pricing'] }}" placeholder="20">
                        <small class="form-text text-muted">Custom price you can add</small>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /Pricing -->
        
        <!-- Services and Specialization -->
        <div class="card services-card">
            <div class="card-body">
                <h4 class="card-title">Services and Specialization</h4>
            
                <div class="form-group">
                    <label>Specialization</label>
                    <input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="services" value="Tooth cleaning " id="services">
                    <small class="form-text text-muted">Note : Type & Press enter to add new services</small>
                </div> 
            
                <div class="form-group mb-0">
                    <label>Services</label>
                    <div style="display: flex ; column-gap: 15px; flex-wrap: wrap" class="form-group">
                        @foreach ($specialties as $specialty)
                        <input {{ $data[0]['specialtyName'] === $specialty['specialtyName'] ? 'checked' : '' }} type="radio" name="specialty" value="{{$specialty['id']}}"> {{$specialty['specialtyName']}} <br>
                        @endforeach
                    </div>        
                </div> 
            </div>              
        </div>
        <!-- /Services and Specialization -->
    
        <!-- Education -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Education</h4>
                <div class="education-info">
                    <div class="row form-row education-cont">
                        <div class="col-12 col-md-10 col-lg-11">
                            <div class="row form-row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Degree</label>
                                        <input name="degree" value="{{$data[0]['degree']}}" type="text" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label >College/Institute</label>
                                        <input name="college" value="{{$data[0]['college']}}" type="text" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Year of Completion</label>
                                        <input name="year_of_completion" value="{{$data[0]['yearOfCompletion']}}" type="text" class="form-control">
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Education -->

        <!-- Experience -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Experience</h4>
                <div class="experience-info">
                    <div class="row form-row experience-cont">
                        <div class="col-12 col-md-10 col-lg-11">
                            <div class="row form-row">
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label>Hospital Name</label>
                                        <input name="hospital" value="{{$data[0]['hospitalName']}}" type="text" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>From</label>
                                        <input name="from" value="{{$data[0]['hospitalFrom']}}" type="text" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>To</label>
                                        <input name="to" value="{{$data[0]['hospitalTo']}}" type="text" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input name="designation" value="{{$data[0]['designation']}}" type="text" class="form-control">
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Experience -->
        
        <!-- Awards -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Awards</h4>
                <div class="awards-info">
                    <div class="row form-row awards-cont">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label>Awards</label>
                                <input name="awards" value="{{$data[0]['awards']}}" type="text" class="form-control">
                            </div> 
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label>Year</label>
                                <input name="awards_year" value="{{$data[0]['awardsYear']}}" type="text" class="form-control">
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Awards -->
        
        <!-- Memberships -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Memberships</h4>
                <div class="membership-info">
                    <div class="row form-row membership-cont">
                        <div class="col-12 col-md-10 col-lg-12">
                            <div class="form-group">
                                <label>Memberships</label>
                                <input name="memberships" value="{{$data[0]['membership']}}" type="text" class="form-control">
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Memberships -->
        
        <!-- Registrations -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Registrations</h4>
                <div class="registrations-info">
                    <div class="row form-row reg-cont">
                        <div class="col-12 col-md-10 col-lg-6">
                            <div class="form-group">
                                <label>Registration</label>
                                <input name="registrations" value="{{$data[0]['registration']}}" type="text" class="form-control">
                            </div> 
                        </div>
                        <div class="col-12 col-md-10 col-lg-6">
                            <div class="form-group">
                                <label>Registration Year</label>
                                <input name="registration_year"  type="text" class="form-control">
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Registrations -->
        
        <div class="submit-section submit-btn-bottom">
            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
        </div>
    </form>
</div>


@endsection
