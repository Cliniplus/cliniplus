@extends('front.layouts.patient-dashboard')
@section('title','Favourites')  
@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
	<div class="row row-grid">
		
		@foreach ($favourites as $favourite)
		<div class="col-md-6 col-lg-4 col-xl-3">
			<div class="profile-widget">
				<div class="doc-img">
					<a href="{{route('doctorProfile',['id'=> $favourite['doctorId']])}}">
						<img class="img-fluid" alt="User Image" src="{{$url.$favourite['doctorImage']}}">
					</a>
					<a href="javascript:void(0)" class="fav-btn">
						<i class="far fa-bookmark"></i>
					</a>
				</div>
				<div class="pro-content">
					<h3 class="title">
						<a href="doctor-profile.html">{{$favourite['doctorName']}}</a> 
						<i class="fas fa-check-circle verified"></i>
					</h3>
					<p class="speciality">{{$favourite['doctorSpecialty']}}</p>
					<div class="rating">
						<i class="fas fa-star filled"></i>
						<i class="fas fa-star filled"></i>
						<i class="fas fa-star filled"></i>
						<i class="fas fa-star filled"></i>
						<i class="fas fa-star filled"></i>
						<span class="d-inline-block average-rating">(17)</span>
					</div>
					<ul class="available-info">
						<li>
							<i class="fas fa-map-marker-alt"></i> Florida, USA
						</li>
						<li>
							<i class="far fa-clock"></i> Available on Fri, 22 Mar
						</li>
						<li>
							<i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
						</li>
					</ul>
					<div class="row row-sm">
						<div class="col-6">
							<a href="{{route('doctorProfile',['id'=> $favourite['doctorId']])}}" class="btn view-btn">View Profile</a>
						</div>
						<div class="col-6">
							<a href="booking.html" class="btn book-btn">Book Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		
	</div>
</div>
@endsection

