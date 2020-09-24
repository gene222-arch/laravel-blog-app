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
    <div class="landing__page__about__us row">

        <div class="about-us-assets row">

            <div class="col-md-12 col-sm-12 mx-auto">
                <h1 class="text-white text-center p-4 rounded" style="background: rgb(104, 104, 255);">Our Achievements</h1>
            </div>
    
            <div class="col-md-12 col-sm-12 p-0">
                <ul class="our-achievements row">

                    <li class="col-md-5 col-sm-2 mx-auto achievement-item">
                        <a href="" class="achievement-link">Ranked 1st in user-friendliness</a>
                    </li>
                    
                    <li class="col-md-5 col-sm-2 mx-auto achievement-item">
                        <a href="" class="achievement-link">2020 People's Choice Award</a>
                    </li>
                    
                    <li class="col-md-5 col-sm-2 mx-auto achievement-item">
                        <a href="" class="achievement-link">Most Recommended Blog Site</a>
                    </li>
                    
                    <li class="col-md-5 col-sm-2 mx-auto achievement-item">
                        <a href="" class="achievement-link">9/10 People Chosen Our Services</a>
                    </li>
                    
                    <li class="col-md-5 col-sm-2 mx-auto achievement-item">
                        <a href="" class="achievement-link">Most Active Blog Site</a>
                    </li>
                    
                </ul>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="about__us__achievements__footer row">
                    <h1 >
                        <span class="emphasized"><strong>L</strong></span>et the w<i class="fas fa-globe-europe text-success" style="font-size: 25px"></i>rld know your Wonderful Stories 
                    </h1>
                    <a href="/posts/create" class="btn btn-success about-us-footer-btn">Get Started</a>
                </div>
            </div>
        </div>
    </div>

@endsection