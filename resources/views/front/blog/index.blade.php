@extends('front.layouts.doctor-dashboard')
@section('title','Blogs')
@section('content')
<div class="col-lg-8 col-md-12">     
     <span>@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif</span>
    <div class="create-blog">
        <div class="creat-blogs">
            <h2>My Blogs</h2>
            <a href="{{route('blog.create')}}">
                <button style="color: #FFFFFF; background: #6EC7C3;
                    border: 1px solid #6EC7C3;
                    border-radius: 6px; width: 130px; height: 40px; "> Add New Blog</button>
            </a>
        </div>

        <!-- Today Appointment Tab -->
        <div class="tab-pane" id="today-appointments">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <!-- <th>No</th> -->
                                <th>No</th>
                                <th>Blog Tiltle</th>
                                <th>Post Date</th>
                                <th>Comment</th>
                                <th>17 Saved</th>
                                <!-- <th class="text-center">Paid Amount</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @if(!is_null($blogs))
                            @foreach ($blogs as $blog)
                            <tr>
                                <?php
                                $date = date('Y-m-d', strtotime($blog['createdDate']));
                                ?>
                                <td>
                                    <p class="fw-bold">1</p>
                                </td>
                                <td>
                                    <a href="{{route('blogDetails',$blog['id'])}}">
                                        <div class="taple-all">
                                            <img height="20px" src="{{$url.$blog['blogImage']}}">
                                            <p class="taple-para">
                                                @if(strlen($blog['title']) > 20)
                                                {{substr($blog['title'],0,20)}}..
                                                @else
                                                {{$blog['title']}}
                                                @endif    
                                            </p>
                                        </div>
                                    </a>
                                </td>
                                <td>{{$date}}</td>
                                <td>16 Comment</td>
                                <td>17 Saved</td>
                                <td>
                                    <a title="edit" href="{{route('blog.edit',$blog['id'])}}" class="btn btn-sm bg-info-light">
                                        <i class="fa fa-pencil"></i> 
                                    </a>
                                </td>
                                <td>
                                    <a title="delete" href="{{-- {{route('blog.destroy',$blog['id'])}} --}}"
                                        class="btn btn-sm bg-danger-light">
                                        <i class="fas fa-times"></i> 
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            
                        </tbody>
                    </table>
                </div>
                <!-- /Today Appointment Tab -->
            </div>
        </div>
    </div>
</div>
@endsection