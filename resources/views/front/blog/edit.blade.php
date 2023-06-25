@extends('front.layouts.doctor-dashboard')
@section('title','Blogs')
@section('content')
  <div class="col-md-12 col-lg-8">
    <div class="create-blog">
      <span>@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif</span>
      <form method="POST" action="" enctype="multipart/form-data">
        @csrf
      <h2>Edit Blog</h2>
      <p>Blog Tiltle</p>
      <div class="handle-input">
        <input value="" name="title" type="text" class="new-form">
        <span>@error('title')<div class="text-danger">{{ $message }}</div>@enderror</span>
      </div>

      <p>Blog Content</p>
      <div class="handle-input">
        <input value="" name="content" type="text" class="new-form">
        <span>@error('content')<div class="text-danger">{{ $message }}</div>@enderror</span>
      </div>

      <p>Blog Image</p>
      <div class="handle-input">

        <input name="image" type="file" class="new-form">
      </div>
      <button style="color: #FFFFFF; background: #6EC7C3;
                                border: 1px solid #6EC7C3;
                                border-radius: 6px; width: 130px; height: 40px; ">Save Changes</button>
      </form>
    </div>
  </div>
@endsection