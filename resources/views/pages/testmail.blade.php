@extends('layouts.app')

@section('content')
    <div class="contact__us__message__area">

        <div class="contact-us-message">

            <div class="contact-logo">
                <a href="">Logo</a>
            </div>
            
            <div class="contact-message-body">
                <p>{{ $data['body'] ?? ''}} </p>
            </div>

        </div>
        
        <p>Thanks for informing us about your concerns, without further ado, we will immediately take actions in order for our valuable users to experience a more comfortable experience</p>
    </div>
@endsection
