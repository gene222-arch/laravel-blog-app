@extends('layouts.main')

@section('pageTitle')
    About
@endsection

@section('content')
<h1 class="about-us-text p-2">A little bit about us...</h1>
    <header class="about__us__header">
        <div class="about-us-header-text">
            <h5>We're here to let the world know your stories with freedom</h5>
            <h5>No Discrimination</h5>
            <h5>More Love</h5>
        </div>
    </header>
    <div class="landing__page__about__us">

        <div class="about-us-assets">
            <h1 class="text-white p-4 rounded" style="background: rgb(104, 104, 255);">We Offer</h1>
            <ul class="our-achievements split">
                <li class="achievement-item">
                    <a href="" class="achievement-link">Unlimited Posts</a>
                </li>
                <li class="achievement-item">
                    <a href="" class="achievement-link">Customizable Profile</a>
                </li>
                <li class="achievement-item">
                    <a href="" class="achievement-link">User-friendly</a>
                </li>
                <li class="achievement-item">
                    <a href="" class="achievement-link">Loved by Many</a>
                </li>
            </ul>
            <div class="about-us-achievements-footer split">
                <h1>
                    <span class="emphasized"><strong>L</strong></span> et the W<i class="fas fa-globe-europe text-success" style="font-size: 25px"></i>rld know your Wonderful Stories 
                </h1>
                <a href="/posts/create" class="btn btn-success py-2 px-5" style="font-size: 30px;">Get Started</a>
            </div>
        </div>
    </div>

@endsection