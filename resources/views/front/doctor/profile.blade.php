@extends('front.layouts.layout')
@section('title','Doctor Profile')
@section('content')
@php
    use Carbon\Carbon;
@endphp
	<!-- Breadcrumb -->
	<div class="breadcrumb-bar">
		<div class="container  align-items-center justify-content-center text-center">
			<div class="row">
				<div class="col-md-12 col-12">
					<h2 class="breadcrumb-title">Doctor Profile</h2>
				</div>
			</div>
		</div>
	</div>
	<!-- /Breadcrumb -->
	<!-- Page Content -->
	<div class="content">
		<div class="container">

			<!-- Doctor Widget -->
			<div class="card">
				<div class="card-body">
					<div class="doctor-widget">
						<div class="doc-info-left">
							<div class="doctor-img">
								<img src="{{$url.$doctor[0]['doctorImage']}}" class="img-fluid" alt="User Image">
							</div>
							<div class="doc-info-cont">
								<h4 class="doc-name">{{$doctor[0]['fullName']}}</h4>
								<p class="doc-speciality">{{$doctor[0]['specialtyName']}}</p>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
								</div>
								<div class="clinic-details">
									<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA - <a href="javascript:void(0);">Get Directions</a></p>
								</div>
							</div>
						</div>
						<div class="doc-info-right">
							<div class="clini-infos">
								<ul>
									<li><i class="far fa-thumbs-up"></i> 99%</li>
									<li><i class="far fa-comment"></i> 35 Feedback</li>
									<li><i class="far fa-money-bill-alt"></i> {{$doctor[0]['pricing']}} per hour </li>
								</ul>
							</div>
						
							<div>
								<div class="button-display">
									<i class="far fa-comment-alt private-button"></i>
									<a class="button-design" href="booking.html">Book Appointment</a>
								</div>						
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Doctor Widget -->
			
			<!-- Doctor Details Tab -->
			<div class="card">
				<div class="card-body pt-0">	
					<!-- Tab Menu -->
					<nav class="user-tabs mb-4">
						<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
							<li class="nav-item">
								<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
							</li>
						</ul>
					</nav>
					<!-- /Tab Menu -->
					
					<!-- Tab Content -->
					<div class="tab-content pt-0">
							
						<!-- Overview Content -->
						<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
							<div class="row">
								<div class="col-md-12 col-lg-9">
								
									<!-- About Details -->
									<div class="widget about-widget">
										<h4 class="widget-title">About Me</h4>
										<p>{{$doctor[0]['aboutMe']}}</p>
									</div>
									<!-- /About Details -->
								
									<!-- Education Details -->
									<div class="widget education-widget">
										<h4 class="widget-title">Education</h4>
										<div class="experience-box">
											<ul class="experience-list">
												<li>
													<div class="experience-user">
														<div class="before-circle"></div>
													</div>
													<div class="experience-content">
														<div class="timeline-content">
															<a href="#/" class="name">{{$doctor[0]['college']}}</a>
															<div>{{$doctor[0]['degree']}}</div>
															<span class="time">{{$doctor[0]['yearOfCompletion']}}</span>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Education Details -->
							
									<!-- Experience Details -->
									<div class="widget experience-widget">
										<h4 class="widget-title">Work & Experience</h4>
										<div class="experience-box">
											<ul class="experience-list">
												<li>
													<div class="experience-user">
														<div class="before-circle"></div>
													</div>
													<div class="experience-content">
														<div class="timeline-content">
															<a href="#/" class="name">{{$doctor[0]['hospitalName']}}</a>
															<span class="time">{{$doctor[0]['hospitalFrom']}} - {{$doctor[0]['hospitalTo']}}</span>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Experience Details -->
						
									<!-- Awards Details -->
									<div class="widget awards-widget">
										<h4 class="widget-title">Awards</h4>
										<div class="experience-box">
											<ul class="experience-list">
												<li>
													<div class="experience-user">
														<div class="before-circle"></div>
													</div>
													<div class="experience-content">
														<div class="timeline-content">
															<p class="exp-year">{{$doctor[0]['awardsYear']}}</p>
															<h4 class="exp-title">{{$doctor[0]['registration']}}</h4>
															<p>{{$doctor[0]['awards']}}</p>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Awards Details -->
									<?php
									$serviceArray = explode(", ", $doctor[0]['doctorServices']);
									?>
									<!-- Services List -->
									<div class="service-list">
										<h4>Services</h4>
										<ul class="clearfix">
											@foreach($serviceArray as $service) 
												<li>{{$service}}</li>
											@endforeach
										</ul>
									</div>
									<!-- /Services List -->
									
									<!-- Specializations List -->
									<div class="service-list">
										<h4>Specializations</h4>
										<ul class="clearfix">
											<li>{{$doctor[0]['specialtyName']}}</li>	
										</ul>
									</div>
									<!-- /Specializations List -->

								</div>
							</div>
						</div>
						<!-- /Overview Content -->
						
						<!-- Reviews Content -->
						<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
							<!-- Review Listing -->
							<div class="widget review-listing">
								<ul class="comments-list">

									<!-- Comment List -->
									@foreach ($reviews as $review)
									<!-- Comment List -->
									@php
									$date = Carbon::createFromFormat('Y m d', $review['creatdDate'])->format('Y-m-d');	
									$date = Carbon::parse($date)->diffForHumans()
									@endphp
									<li>
										<div class="comment">
											<img class="avatar avatar-sm rounded-circle" alt="User Image"
												src="{{$url.$review['patientImage']}}">
											<div class="comment-body">
												<div class="meta-data">
													<span class="comment-author">{{$review['patientName']}}</span>
													<span class="comment-date">{{$date}}</span>
													<div class="review-count rating">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star"></i>
													</div>
												</div>
												<p class="comment-content">
												{{$review['review']}}
												</p>
												<div class="comment-reply">
													<a class="comment-btn" href="#">
														<i class="fas fa-reply"></i> Reply
													</a>
													<p class="recommend-btn">
														<span>Recommend?</span>
														<a href="#" class="like-btn">
															<i class="far fa-thumbs-up"></i> Yes
														</a>
														<a href="#" class="dislike-btn">
															<i class="far fa-thumbs-down"></i> No
														</a>
													</p>
												</div>
											</div>
										</div>
									</li>
									<!-- /Comment List -->
									@endforeach
								</ul>

								<!-- Show All -->
								<div class="all-feedback text-center">
									<a href="#" class="btn btn-primary btn-sm">
										Show all feedback <strong>({{count($reviews)}})</strong>
									</a>
								</div>
								<!-- /Show All -->

							</div>
							<!-- /Review Listing -->

							<!-- Write Review -->
							<div class="write-review">
								<h4>Write a review for <strong>{{$doctor[0]['fullName']}}</strong></h4>

								<!-- Write Review Form -->
								<form method="POST" action="{{route('postReviews',$id)}}">
									@csrf
									<div class="form-group">
										<label>Your Review</label>
										<div class="star-rating">
											<input id="star-5" type="radio" name="rating" value="star-5">
											<label for="star-5" title="5 stars">
												<i class="active fa fa-star"></i>
											</label>
											<input id="star-4" type="radio" name="rating" value="star-4">
											<label for="star-4" title="4 stars">
												<i class="active fa fa-star"></i>
											</label>
											<input id="star-3" type="radio" name="rating" value="star-3">
											<label for="star-3" title="3 stars">
												<i class="active fa fa-star"></i>
											</label>
											<input id="star-2" type="radio" name="rating" value="star-2">
											<label for="star-2" title="2 stars">
												<i class="active fa fa-star"></i>
											</label>
											<input id="star-1" type="radio" name="rating" value="star-1">
											<label for="star-1" title="1 star">
												<i class="active fa fa-star"></i>
											</label>
										</div>
									</div>
									<div class="form-group">
										<label>Your review</label>
										<textarea name="review" id="review_desc" maxlength="100" class="form-control"></textarea>
										<span>@error('review')<div class="text-danger">{{ $message }}</div>@enderror</span>
										<div class="d-flex justify-content-between mt-4"><small
												class="text-muted d-flex  justify-content-center">Recommend?
												<p class="recommend-btn">
													<a href="#" class="cheak">
														<i class="far fa-thumbs-up"></i> Yes
													</a>
													<a href="#" class="cheak">
														<i class="far fa-thumbs-down"></i> No
													</a>
												</p></small>
										</div>
									</div>
									<hr>

									<div class="submit-section">
										<button type="submit" class="btn btn-primary submit-btn">Add Review</button>
									</div>
								</form>
								<!-- /Write Review Form -->

							</div>
							<!-- /Write Review -->

						</div>
						<!-- /Reviews Content -->
						
						@php
							date_default_timezone_set('Asia/Gaza');
							$currentDay = date('l'); // Get the current day
 							$currentTime = date('H:i'); // Get the current time
							$currentDate = date('Y-m-d');

							foreach ($businessHours as $businessHour) {
								$businessHourDay = $businessHour['day'];
								$businessHourTimeRange = $businessHour['availableTime'];

								if ($businessHourDay === $currentDay && isTimeInRange($currentTime, $businessHourTimeRange)) {
									$status = "Open Now";
								}
								if ($businessHourDay === $currentDay){
									$businessTime = $businessHourTimeRange;
								}
							}

							function isTimeInRange($time, $timeRange)
							{
								date_default_timezone_set('Asia/Gaza');
								[$startTime, $endTime] = explode('-', $timeRange);
								$startTime = date_create_from_format('h:i A', trim($startTime))->format('H:i');
								$endTime = date_create_from_format('h:i A', trim($endTime))->format('H:i');
								$currentTime = date('H:i'); 
								return ($currentTime >= $startTime && $currentTime <= $endTime);
							}

							usort($businessHours, function ($a, $b) {
								return strcmp(strtolower($a['day']), strtolower($b['day']));
							});

							
						@endphp
						<!-- Business Hours Content -->
						<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
							<div class="row">
								<div class="col-md-6 offset-md-3">
								
									<!-- Business Hours Widget -->
									<div class="widget business-widget">
										<div class="widget-content">
											<div class="listing-hours">
												<div class="listing-day current">
													<div class="day">Today <span>{{Carbon::createFromFormat('Y-m-d', $currentDate)->format('j M Y')}}</span></div>
													<div class="time-items">
														@if(isset($status))
														<span class="open-status"><span class="badge bg-success-light">open now</span></span>
														@else
														<span class="open-status"><span class="badge bg-danger-light">closed now</span></span>

														@endif
														<span class="time">{{$businessTime}}</span>
													</div>
												</div>
												
												
												
												
												@foreach ($businessHours as $businessHour)
												<div class="listing-day">
													<div class="day">{{$businessHour['day']}}</div>
													<div class="time-items">
														<span class="time">{{$businessHour['availableTime']}}</span>
													</div>
												</div>
												@endforeach


												<div class="listing-day closed">
													<div class="day">Sunday</div>
													<div class="time-items">
														<span class="time"><span class="badge bg-danger-light">Closed</span></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Business Hours Widget -->
							
								</div>
							</div>
						</div>
						<!-- /Business Hours Content -->
						
					</div>
					<!-- Tab Content -->

				</div>
			</div>
			<!-- /Doctor Details Tab -->

		</div>
	</div>		
	<!-- /Page Content -->
@endsection