@extends('front.layouts.layout')
@section('title','search')
@section('content')

    <div class="about">
        <div class="main-heading">
        <h2>Blogs</h2>
        </div>
    </div>


  <!-- content -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="content-div">
          <div class="con-img">
            <img src="{{$url.$blog[0]['blogImage']}}" />
            <h1 class="h1-sty">{{$blog[0]['title']}}</h1>
          </div>
          <div class="section-main d-flex justify-content-bettwen align-items-center py-3">
            <div class="d-flex justify-content-center align-items-center ">
              <img class="rounded" height="35px" src="{{$url.$blog[0]['doctorImage']}}" />
              <p class="plus-margin ps-2">{{$blog[0]['name']}}</p>
            </div>
            <div class="d-flex justify-content-center align-items-center ">
              <img src="{{asset('front/img/about/calenderNew.png')}}" />
              <p class="plus-margin ps-2">{{date('Y-m-d', strtotime($blog[0]['createdDate']))}}</p>
            </div>
            <div class="d-flex justify-content-center align-items-center ">
              <img src="{{asset('front/img/about/comment.png')}}" />
              <p class="plus-margin ps-2">12 Comments</p>
            </div>
            <div class="d-flex justify-content-center align-items-center ">
              <img src="{{asset('front/img/about/saved.png')}}" />
              <p class="plus-margin ps-2">99%</p>
            </div>

          </div>
          <div class="para-blog py-5">
            <p> {{$blog[0]['content']}}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="share-post">
      <div class="share-text">
        <h3>Share the post</h3>
      </div>
      <div class=" d-flex justify-content-start p-3 ">
        <a href="#"><i class="icon fa-brands fa-facebook fa-2x "></i></a>
        <a href="#"><i class="icon fa-brands fa-youtube fa-2x"></i></a>
        <a href="#"><i class="icon fa-brands fa-linkedin fa-2x "></i></a>
        <a href="#"><i class="icon fa-brands fa-twitter fa-2x "></i></a>
        <a href="#"><i class="icon fa-brands fa-google-plus-g fa-2x"></i></a>
      </div>
    </div>
  </div>

@endsection