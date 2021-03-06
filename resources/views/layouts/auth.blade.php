<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('pageTitle') </title>

{{-- external links --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

{{-- scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
{{-- styles  --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    
    <div class="app">
        @include('includes.user_profile')
        <div class="profile-outer-container">
            @yield('sidebar')
            @yield('content')
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('js/custom.js') }}">
    @yield('scripts')
</body>
</html>