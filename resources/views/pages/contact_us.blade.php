@extends('layouts.main')

@section('pageTitle')
    Contact
@endsection

@section('content')

    <div class="footer split">

        <div class="container contact__form spacing">
            <h1 class="text-center">Mail us</h1>
            <form id="sendGmail" class="contact-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">To</label>
                    <input type="email" name="email" class="form-control email" id="" placeholder="Recipient" required>
                    
                    <div class="invalid-feedback email-err"></div>

                </div>

                {{-- <div class="form-group">
                    <label for="images">File</label>
                    <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror p-1 images" id="" multiple>
                    
                    @error('images')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> --}}

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="subject" name="subject" class="form-control subject" id="" placeholder="Your Subject" required>
                    
                    <div class="invalid-feedback subject-err"></div>

                </div>

                <div class="form-group">
                    <label for="message_body">Message</label>
                    <textarea name="message_body" value="{{ Auth::id()}}" class="form-control message_body" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
                    
                    <div class="invalid-feedback message_body-err"></div>

                </div>
                @auth
                    <button type="submit" class="btn btn-success send-mail">Send Mail</button>
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


@section('scripts')

<script>
    $(document).ready(function () {

        document.querySelector('#sendGmail').addEventListener('submit', function (e) { 

            e.preventDefault();

            let _token = document.querySelector("input[name='_token']").value;
            let email = document.querySelector('.email').value;
            let subject =document.querySelector('.subject').value;
            let message_body = document.querySelector('.message_body').value;

            $.ajax({

                url: "{{ route('mail.send') }}",
                type: "POST",
                data : {
                    _token : _token,
                    email : email,
                    subject : subject,
                    message_body : message_body
                },
                success: function (data) {
                    
                    if ( !data.error ) {
                        
                        alert('Success');
                        document.querySelector('#sendGmail').reset();

                    } else {

                        printErrorMsg(data.error);
                    }
                }
            });

        });

        function printErrorMsg (msg) {

            $.each( msg, function( key, value ) {

                document.querySelector('.' + key).classList.add('is-invalid')
                document.querySelector('.' + key + '-err').innerText = value[0];
            });
        }

});
</script>

@endsection
