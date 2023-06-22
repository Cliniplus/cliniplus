<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    
    <!-- Favicons -->
    <link href="{{asset('front/img/favicon.png')}}" rel="icon">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('front/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/plugins/fontawesome/css/all.min.css')}}">
    
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('front/plugins/select2/css/select2.min.css')}}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
    
    <link rel="stylesheet" href="{{asset('front/plugins/dropzone/dropzone.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    @yield('head')
    
</head>