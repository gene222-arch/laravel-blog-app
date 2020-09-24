
  <nav class="navbar navbar-expand-sm main__nav__bar">
    <div class="container-fluid">

        <a class="navbar-brand text-danger" href="{{ url('/') }}">
            StoryTime   
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="fas fa-ellipsis-v"></span>
      </button>

      <div class="collapse navbar-collapse ml-4" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link {{ Request::is('aboutus') ? 'active' : ''}} " href="/aboutus">About us</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link {{ Request::is('services') ? 'active' : ''}}" href="/services">Services</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ Request::is('contactus') ? 'active' : ''}}" href="/contactus">Contact us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('posts') ? 'active' : ''}}" href="/posts">Posts</a>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link {{ Request::is('login') ? 'active' : ''}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if ( Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('register') ? 'active' : ''}}" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->firstname }}
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