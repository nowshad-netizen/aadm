{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title'){{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <!-- Bootstrap -->
		<link rel="stylesheet" href="{{ asset('assets/frontend/scripts/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<!-- IonIcons -->
		<link rel="stylesheet" href="{{ asset('assets/frontend/scripts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Toast -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/toastr.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/frontend/scripts/toast/jquery.toast.min.css') }}">
		<!-- OwlCarousel -->
		{{-- <link rel="stylesheet" href="{{ asset('assets/frontend/scripts/owlcarousel/dist/assets/owl.carousel.min.css') }}">  --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/scripts/owlcarousel/dist/assets/owl.theme.default.min.css') }}">  --}}
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="{{ asset('assets/frontend/scripts/magnific-popup/dist/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/frontend/scripts/sweetalert/dist/sweetalert.css') }}">
    <!-- Custom style -->
		<link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/all.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/frontend/css/demo.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    @stack('custom-css')
</head> --}}
<body class="skin-orange">
    @include('layouts.frontend.partial.header')
    @include('layouts.frontend.partial.manu')
    @include('layouts.frontend.partial.trends')
    @yield('containt')   
    @include('layouts.frontend.partial.footer')
     <!-- Footer -->
     <script>
            $(window).load(function(){
              $("#header").sticky({ topSpacing: 100 });
            });
          </script>
      {{-- toster  --}}
            {{-- <script src="https://cdn.bootcss.com/toastr.js/latest/js/"></script> --}}
            <script src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
            <script src="{{ asset('assets/frontend/js/jquery.migrate.js') }}"></script>
            <script src="{{ asset('assets/frontend/scripts/bootstrap/bootstrap.min.js') }}"></script>
            <script>var $target_end=$(".best-of-the-week");</script>
            <script src="{{ asset('assets/frontend/scripts/jquery-number/jquery.number.min.js') }}"></script>
            <script src="{{ asset('assets/frontend/scripts/owlcarousel/dist/owl.carousel.min.js') }}"></script>
            <script src="{{ asset('assets/frontend/scripts/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
            <script src="{{ asset('assets/frontend/scripts/easescroll/jquery.easeScroll.js') }}"></script>
            <script src="{{ asset('assets/frontend/scripts/sweetalert/dist/sweetalert.min.js') }}"></script>
            <script src="{{ asset('assets/frontend/js/toastr.min.js') }}"></script>
            
            {!! Toastr::message() !!}
            
            
            <script src="{{ asset('assets/frontend/scripts/toast/jquery.toast.min.js') }}"></script>
            {{-- <script src="{{ asset('assets/frontend/js/demo.js') }}"></script> --}}
            {{-- <script src="{{ asset('assets/frontend/js/jquery-3.2.1.slim.min.js') }}"></script> --}}
            {{-- <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script> --}}
            {{-- <script src="{{ asset('assets/frontend/js/jquery-3.2.1.slim.min.js') }}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
            {{-- <script src="{{ asset('assets/frontend/js/popper.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
            <script src="{{ asset('assets/frontend/js/e-magz.js') }}"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
            @stack('custom-css')
</body>
</html>
