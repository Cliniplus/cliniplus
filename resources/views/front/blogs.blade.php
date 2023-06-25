@extends('front.layouts.layout')
@section('title','blogs')
@section('content')

<div class="about ">
  <div class="main-heading">
    <h2>Blogs</h2>
  </div>
</div>
<div class="container">
  <div class="form-group form-focus">
    <input type="email" class="form-control floating">
    <label class="focus-label"> Search blogs </label>
  </div>
</div>


<!--  Card item -->


<div class="container">
  <div class="row">
    @foreach ($blogs as $blog)
    <div class="col-lg-4 col-md-12">
      <div class="complete-card">
        <div class="item-img">
          <a href="{{route('blogDetails',$blog['id'])}}">
            <img width="365px" height="194px" class="rounded-image1" src="{{$url.$blog['blogImage']}}" class="blog-image">
          </a>
        </div>
        <div class="p-3">
          <h2 style="margin-bottom: 40px;">{{substr($blog['title'],0,20)}}</h2>
          <div class="doctor-date">

            <div class="section1">
              <img height="41px" class="rounded-image" src="{{$url.$blog['doctorImage']}}" />
              <p style="margin-bottom: 6px;">{{$blog['name']}}</p>
            </div>

            <div class="date-section">
              <img src="{{asset('front/img/about/Vector.png')}}" class="clock-icon" />
              <p style="margin-left: 15px;">{{substr($blog['createdDate'],0,10)}}</p>
            </div>

          </div>
          <div>
            <p class="sty-p pb-5">
              {{substr($blog['content'],0,100)}}..
            </p>
          </div>
          <a href="{{route('blogDetails',$blog['id'])}}" class="cart-btn">Read more</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>





  {{-- <div class="about ">
    <div class="main-heading">
      <h2>Blogs</h2>
    </div>
  </div>
  
  <div class="container">
    <div class="form-group form-focus">
      <input type="email" class="form-control floating">
      <label class="focus-label"> Search blogs </label>
    </div>
  </div>

  <div class="container">
    <div class="row">
      @foreach ($blogs as $blog)
        <div class="col-lg-4 col-md-12">
          <div class="complete-card">
            <div class="item-img">
              <a href="/blogs-details.html">
                <img src="{{$url.$blog['blogImage']}}" class="blog-image">
              </a>
            </div>
            <div class="p-3">
              <h2 style="margin-bottom: 20px;">{{$blog['title']}}</h2>
              <div class="doctor-date">

                <div class="section1">
                  <img height="41px" class="rounded-image" src="{{$url.$blog['doctorImage']}}" />
                  <p style="margin-bottom: 6px;">{{$blog['name']}}</p>
                </div>

                <div class="date-section">
                  <img src="{{asset('front/img/about/Vector.png')}}" class="clock-icon" />
                  <p style="margin-left: 15px;">{{substr($blog['createdDate'],0,10)}}</p>
                </div>

              </div>
              <div>
                <p class="sty-p pb-5">
                  {{$blog['content']}}
                </p>
              </div>
              <button class="cart-btn">Read more</button>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
        --}}
@endsection