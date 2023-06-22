<!doctype html>
@include('admin.partials.head')
<body style="background-color: @yield('color') ">
    <div id='app'>
        @include('admin.partials.nav')
        @include('admin.partials.side')
       
        <div>
             @yield('content') 
        </div>
    </div>
    @include('admin.partials.scripts')
</body>
</html>