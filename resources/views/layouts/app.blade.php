<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ auth()->check()? auth()->id(): '' }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">

	<!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    {{-- Bootstrap File Input Plugin --}}
    <link
        rel="stylesheet"
        type="text/css"
        media="all"
        href="{{ asset('frontend/bootstrap-file-input/css/fileinput.min.css') }}" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Theme Stylesheets -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

	<!-- Modernizer js -->
    <script src="{{ asset('frontend/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    @yield('style')
</head>
<body>
    <div id="app">
        <div class="wrapper" id="wrapper">

            @include('partials.frontend.header')
            <main>
                @if (session('message')||session('resent')||session('status'))
                @include('partials.flash')
                @endif
                @yield('content')
            </main>
            @include('partials.frontend.footer')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Theme JS Files -->
	<script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/active.js') }}"></script>


    {{-- Bootstrap File Input Plugin --}}
    <script src="{{ asset('frontend/bootstrap-file-input/js/plugins/piexif.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/bootstrap-file-input/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --}}
    {{-- <script src="{{ asset('frontend/bootstrap-file-input/js/plugins/purify.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/bootstrap-file-input/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('frontend/bootstrap-file-input/themes/fa/theme.min.js') }}"></script>

    {{-- Custome JS File --}}
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    @yield('script')
</body>
</html>