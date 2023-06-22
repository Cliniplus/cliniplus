@extends('front.layouts.doctor-dashboard')
@section('title','Dashboard')  
@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="col-md-7 col-width-lg col-xl-9">
    <div class="doc-review review-listing">

        <!-- Review Listing -->
        <ul class="comments-list">

            <!-- Comment List -->
            @foreach ($reviews as $review)   
            @php
                $date = Carbon::createFromFormat('Y m d', $review['creatdDate'])->format('Y-m-d');	
                $date = Carbon::parse($date)->diffForHumans()
            @endphp
            <li>
                <div class="comment">
                    <img class="avatar rounded-circle" alt="User Image"
                        src="{{$url.$review['patientImage']}}">
                    <div style="width:100%" class="comment-body">
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
                        {{-- <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the
                            doctor</p> --}}
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
            @endforeach

              {{--   <!-- Comment Reply -->
                <ul class="comments-reply">

                    <!-- Comment Reply List -->
                    <li>
                        <div class="comment">
                            <img class="avatar rounded-circle" alt="User Image"
                                src="assets/img/doctors/doctor-thumb-02.jpg">
                            <div class="comment-body">
                                <div class="meta-data">
                                    <span class="comment-author">Dr. Darren Elder</span>
                                    <span class="comment-date">Reviewed 3 Days ago</span>
                                </div>
                                <p class="comment-content">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua.
                                    Ut enim ad minim veniam.
                                    Curabitur non nulla sit amet nisl tempus
                                </p>
                                <div class="comment-reply">
                                    <a class="comment-btn" href="#">
                                        <i class="fas fa-reply"></i> Reply
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- /Comment Reply List -->

                </ul>
                <!-- /Comment Reply --> --}}

        </ul>
        <!-- /Comment List -->

    </div>
</div>
@endsection 