@extends('layouts.main')

@section('pageTitle')
    Home
@endsection

@section('content')
    <div class="landing-page">
        <div class="landing-text-container">
            <div class="home-page-landing-text">
                Share
            </div>
            <div class="home-page-landing-text">
                Your
            </div>
            <div class="home-page-landing-text">
                Story<i class="fas fa-book-open text-warning"></i>
            </div>
            <div class="home-page-landing-text">
                To
            </div>
            <div class="home-page-landing-text">
                Us
            </div>
        </div>
    </div>
    <div class="brand__quote">
        <p class="brand-description"><span class="emphasized">WRITE</span> until it BECOMES as natural as BREATHING <br> <span class="emphasized">WRITE</span> until NOT WRITING  makes you ANXIOUS</p>
        <a href="login" class="btn btn-warning get-started-btn">Let's Start Writing Your Story</a>
    </div>

    @endsection
