<!doctype html>
@include('front.partials.head')
<body style="background-color: @yield('color') ">
    <div class="main-wrapper">
        @include('front.partials.nav')
        <div>
            @yield('content')
        </div>
        @include('front.partials.footer')
    </div>
@include('front.partials.scripts')
</body>
</html>