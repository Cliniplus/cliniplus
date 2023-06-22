<!doctype html>
@include('front.partials.head')
<body style="background-color: @yield('color') ">
    <div id='app'>
        @include('front.partials.nav')
        @include('front.partials.breadcrumb')
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar"> 
                        @include('front.partials.doctor-sidebar')
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
        @include('front.partials.footer')
    </div>
@include('front.partials.scripts')
</body>
</html>