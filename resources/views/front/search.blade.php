@extends('front.layouts.layout')
@section('title','search')
@section('content')

<!-- Page Content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-width col-xl-3 theiaStickySidebar">
            
                <!-- Search Filter -->
                <div class="card search-filter">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Search Filter</h4>
                    </div>
                    <div class="card-body">
                    <div class="filter-widget">
                        <div class="cal-icon">
                            <input type="text" class="form-control datetimepicker" placeholder="Select Date">
                        </div>			
                    </div>
                    <form method="POST" action="{{route('postSearch')}}">
                    @csrf
                    <div class="filter-widget">
                        <h4>Gender</h4>
                        <div>
                            <label class="custom_check">
                                <input type="checkbox" value="male" name="gender_type" onchange="handleCheckboxChange(this)" checked>
                                <span class="checkmark"></span> Male Doctor
                            </label>
                        </div>
                        <div>
                            <label class="custom_check">
                                <input type="checkbox" value="female" name="gender_type"  onchange="handleCheckboxChange(this)"> 
                                <span class="checkmark"></span> Female Doctor
                            </label>
                        </div>
                        <span>@error('gender_type')<div class="text-danger">{{ $message }}</div>@enderror</span>
                    </div>
                    <div class="filter-widget">
                        <h4>Select Specialist</h4>
                        @foreach ($specialties as $key => $item)
                        <div>
                            <label class="custom_check">
                                <input type="checkbox" value="{{$item['id']}}" name="select_specialist" onchange=" handleCheckboxChange1(this)" {{ $key == 0 ? 'checked' : '' }}>
                                <span class="checkmark"></span> {{$item['specialtyName']}}
                            </label>
                        </div>    
                        @endforeach
                        <span>@error('select_specialist')<div class="text-danger">{{ $message }}</div>@enderror</span>
                    </div>
                  
                    <div class="btn-search">
                        <button type="submit" class="btn btn-block">Search</button>
                    </div>	
                    </form>
                    </div>
                </div>
                <!-- /Search Filter -->
                
            </div>
            
            <div class="col-md-12 col-width-lg col-xl-9">
                @foreach ($searchDoctor as $doctor )
                @php
                $specialtyNameToSearch = $doctor['specialityName'];
                $foundSpecialties = array_filter($specialties, function ($item) use ($specialtyNameToSearch) {
                return $item['specialtyName'] === $specialtyNameToSearch;
                });
                $foundImages = array_column($foundSpecialties, 'image');                
                @endphp
                
                <div class="card">
                    <div class="card-body">
                        <div class="doctor-widget">
                            <div class="doc-info-left">
                                <div class="doctor-img">
                                    <a href="{{route('doctorProfile', ['id' => $doctor['doctorId']])}}">
                                        <img src="{{$url.$doctor['doctorImage']}}" class="img-fluid" alt="User Image">
                                    </a>
                                </div>
                                <div class="doc-info-cont">
                                    <h4 class="doc-name"><a href="{{route('doctorProfile', ['id' => $doctor['doctorId']])}}">{{$doctor['doctorName']}}</a></h4>
                                    <p class="doc-speciality">{{$doctor['specialityName']}}</p>
                                    <h5 class="doc-department"><img src="{{$url.$foundImages[0]}}" class="img-fluid" alt="Speciality">{{$doctor['specialityName']}}</h5>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(17)</span>
                                    </div>
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Florida, USA</p>
                                </div>
                            </div>
                            <div class="doc-info-right">
                                <div class="clini-infos">
                                    <ul>
                                        <li><i class="far fa-thumbs-up"></i> 98%</li>
                                        <li><i class="far fa-comment"></i> 17 Feedback</li>
                                        <li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
                                    </ul>
                                </div>
                                <div class="clinic-booking">
                                    <a class="view-pro-btn" href="{{route('doctorProfile', ['id' => $doctor['doctorId']])}}">View Profile</a>
                                    <a class="apt-btn" href="booking.html">Book Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
        


                <div class="load-more text-center">
                    <a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>	
                </div>	
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection
