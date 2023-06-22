@extends('front.layouts.doctor-dashboard')
@section('title','SocialMedia')  
@section('content')
<div class="col-md-12 col-width-lg col-xl-9">
    <div class="card">
        <div class="card-body">
            <span>@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif</span>
            <!-- Social Form -->
            <form method="POST" action="{{route('postSocialMedia')}}">        
                @csrf                                                                                   
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="form-group">
                            <label>Facebook URL</label>
                            <input name="facebook" type="text" class="form-control">
                            <span>@error('facebook')<div class="text-danger">{{ $message }}</div>@enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="form-group">
                            <label>Twitter URL</label>
                            <input name="twitter" type="text" class="form-control">
                            <span>@error('twitter')<div class="text-danger">{{ $message }}</div>@enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="form-group">
                            <label>Instagram URL</label>
                            <input name="instagram" type="text" class="form-control">
                            <span>@error('instagram')<div class="text-danger">{{ $message }}</div>@enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="form-group">
                            <label>Linkedin URL</label>
                            <input name="linkedin" type="text" class="form-control">
                            <span>@error('linkedin')<div class="text-danger">{{ $message }}</div>@enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="form-group">
                            <label>Website URL</label>
                            <input name="website" type="text" class="form-control">
                            <span>@error('website')<div class="text-danger">{{ $message }}</div>@enderror</span>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                </div>
            </form>
            <!-- /Social Form -->
            
        </div>
    </div>
</div>
@endsection