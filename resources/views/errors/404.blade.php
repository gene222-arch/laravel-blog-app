@extends('layouts.app')

@section('pageTitle')
    404
@endsection

@section('content')
    <div class="error__page">
        <div class="error-message">
            <h1 class="text-danger">404</h1>
            <h4>Sorry, the page you`re trying to access is not avaiable</h4>
        </div>
        <button role="button" class="btn btn-primary return-prev-page">Return</button>
    </div>
   
    
@endsection

@section('scripts')
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection