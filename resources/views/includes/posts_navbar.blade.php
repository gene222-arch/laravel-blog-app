
  <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
    <div class="container-fluid">

        <a class="navbar-brand text-danger" href="{{ url('/') }}">
            StoryTime   
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
{{-- Offline User --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
{{-- Online User --}}
                @else 
                    <li class="nav-item">
                        <a href="/posts" class="nav-link {{ Request::is('posts') ? 'text-white' : 'text-primary'}}">Posts</a>
                    </li>
                    <li class="nav-item {{ Request::is('/posts/create') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('posts/create') ? 'text-white' : 'text-primary'}}" href="/posts/create"> 
                            <i class="fas fa-feather {{ Request::is('posts/create') ? 'text-white' : 'text-primary'}}"></i> Write Posts
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name ?? 'Guest' }}
                        </a>
  
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>    
                            <a href="/dashboard" class="dropdown-item"> {{ __('Dashboard') }}</a>          
                            <a href="/user/profile" class="dropdown-item">Profile</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
  </nav>

  <img src="/storage/profile_images/{{ Auth::user()->profile_img }}" class="rounded-circle profile-pic" title="{{ Auth::user()->name ?? 'Guest' }}">
