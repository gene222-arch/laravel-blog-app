@extends('layouts.main')

@section('pageTitle')
    Contact
@endsection

@section('content')

    <div class="footer split">

        <div class="container contact__form spacing">
            <h1 class="text-center">Mail us</h1>
            <form method="POST" class="contact-form" action="{{ action('App\Http\Controllers\MailsController@store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">To</label>
                    <input type="email" value="{{ Auth::user()->email ?? 'Guest@yahoo.com' }}" class="form-control @error('email') is-invalid @enderror" name="email" id="" required>
                    
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="images">File</label>
                    <input type="file" class="form-control @error('images') is-invalid @enderror p-1" name="images[]" id="" required multiple>
                    
                    @error('images')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="subject" name="subject" value="{{ Auth::user()->subject ?? 'Guest@yahoo.com' }}" class="form-control @error('subject') is-invalid @enderror" id="" required>
                    
                    @error('subject')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message_body">Message</label>
                    <textarea name="message_body" class="form-control @error('message_body') is-invalid @enderror" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
                    
                    @error('message_body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                @auth
                    <button class="btn btn-success">Send Mail</button>
                @endauth
            </form>
        </div>

        <div class="footer__info">
            <div class="footer-info-logo">
                <h1><a href="/" class="text-danger">StoryTime</a></h1>
                <small class="text-secondary">Share your amazing Story</small>
            </div>
            <ul class="created__by split">
                <h5>Created by</h5>
                <li class="created-by-item">
                    <a href="" class="created-by-link">Gene Phillip Artista</a>
                </li>
                <li class="created-by-item">
                    <a href="" class="created-by-link">Elmer Penaverde</a>
                </li>
                <li class="created-by-item">
                    <a href="" class="created-by-link">Bryan Paz</a>
                </li>
            </ul>
    
            <ul class="contact split">
                <h5>Contact</h5>
                <li class="contact-item">
                    <a href="" class="contact-link">0956 252 303</a>
                </li>
                <li class="contact-item">
                    <a href="" class="contact-link">0956 252 303</a>
                </li>
                <li class="contact-item">
                    <a href="" class="contact-link">0956 252 303</a>
                </li>
            </ul>
            <ul class="helpful__links split">
                <h5>Helpful Links</h5>
                <li class="helpful-links-item">
                    <a href="" class="helpful-links-link">Services</a>
                </li>
                <li class="helpful-links-item">
                    <a href="" class="helpful-links-link">Supports</a>
                </li>
                <li class="helpful-links-item">
                    <a href="" class="helpful-links-link">Terms and Condition</a>
                </li>
            </ul>
        </div>
        <div class="copyright">
            <div class="social__media">
                <ul class="social-media-links">
                    <li class="social-media-item">
                        <a href="" class="social-media-link"><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li class="social-media-item">
                        <a href="" class="social-media-link"><i class="fab fa-google-plus-square text-secondary"></i></a>
                    </li>
                    <li class="social-media-item">
                        <a href="" class="social-media-link"><i class="fab fa-twitter-square" style="color: #00acee;"></i></a>
                    </li>
                    <li class="social-media-item">
                        <a href="" class="social-media-link">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="copyright-2020" style="width: 100%;">
                <hr>
                <p class="p-2 text-secondary" >All rights © 2020 · StoryTime · All rights reserved
                    Browse now
                    Created by Gene Phillip D. Artista
                    
                </p>
            </div>
        </div>
    </div>

@endsection