@extends('layouts.app')

@section('content')

        <!-- Modal -->
        <div class="modal fade modal__container" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="img__body">
                        <img alt="" class="modal-img-holder">
                        <h5 class="img-name" style="margin: -0.5rem 0 1.5rem">Gene Phillip Artista</h5>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror email-modal" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Your Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>

                            @if (Route::has('password.request'))
                                <a class="text-center btn-block" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                            <a class="btn btn-success btn-block mt-1" href="/register">
                                {{ __('Create an Account ') }}
                            </a>   
                                                      
                        </div> 

                      </form>
                </div>

            </div>
            </div>
        </div>
    <div class=" user__login">
        <div class="users">
            @forelse ($users as $username)
            <div class="container-recent-logins">
                <div class="recent__logins">
                    <div class="card recent-login-card" style="border-radius: 1rem;">
                        <img src="../../../storage/profile_images/{{ $username->profile_img }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <p class="card-title">
                            {{-- <a href="/user/show_recent_login/{{ $username->id }}">{{ $username->firstname ?? 'Guest' }}</a> --}}
                                    <!-- Button trigger modal -->
                        <button type="button" value="{{ $username->email }}" data-id="{{ $username->profile_img }}" class="btn btn-primary btn-show-recent-user" data-toggle="modal" data-target="#exampleModal">
                            {{ $username->firstname }}
                        </button>
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            None
        @endforelse            
        </div>
        <div class="login__form">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="text-center btn-block" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <hr>
                                <a class="btn btn-success btn-block mt-1" href="/register">
                                    {{ __('Create an Account ') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="/posts"><h5>Look at other's posts</h5></a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.btn-show-recent-user').forEach(user => {

            let emailModal = document.querySelector('.email-modal');
            let imgHolder = document.querySelector('.modal-img-holder');

            user.addEventListener('click', function () {

                emailModal.value = user.value;
                imgHolder.setAttribute('src', '../../../storage/profile_images/' + user.getAttribute('data-id'));
            });

        });
    </script>
@endsection