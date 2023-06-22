<!doctype html>
@include('front.partials.head')
<body class="chat-page" style="background-color: @yield('color') ">
    <div id='app'>
        @include('front.partials.nav')
        <div>
            @yield('content')
        </div>
    </div>
@include('front.partials.scripts')
</body>
</html>