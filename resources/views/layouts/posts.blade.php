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

        @include('includes.posts_navbar')
 
        <div class="container">
            @include('includes.messages')
            @yield('content')
        </div>

    </div>
      
    @yield('scripts')
    <script src="{{ asset('js/lazysizes.min.js') }}" async></script>
</body>
</html>