@extends('front.layouts.doctor-dashboard')
@section('title','Blogs')
@section('content')
<div class="col-md-12 col-lg-8">
    <div class="create-blog">

      <h2>Add New Blog</h2>
      <p>Blog Tiltle</p>
      <div class="handle-input">
        <input type="email" class="new-form">
      </div>

      <p>Blog Content</p>
      <div class="handle-input">
        <input type="email" class="new-form">
      </div>

      <p>Blog Image</p>
      <div class="handle-input">

        <input type="email" class="new-form">
      </div>
      <button style="color: #FFFFFF; background: #6EC7C3;
                                border: 1px solid #6EC7C3;
                                border-radius: 6px; width: 130px; height: 40px; ">Save Changes</button>
    </div>
  </div>
@endsection