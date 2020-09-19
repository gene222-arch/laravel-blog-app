@extends('layouts.auth')

@section('sidebar')
    <div class="profile-side-bar">
        <div class="side-bar-img">
            <img src="../../../storage/profile_images/{{ Auth::user()->profile_img ?? 'no_profile_image.png' }}" alt="">
            <h5 class="side-bar-profile-username text-center"><strong>{{ Auth::user()->name ?? 'Guest' }}</strong></h5>
            <blockquote class="text-center text-secondary">"Ball is lyf"</blockquote>
        </div>
        <ul class="side-bar">
            <li class="side-bar-item"><i class="fas fa-user-edit text-primary"></i> <a href="" class="side-bar-link">Me</a></li>
            <li class="side-bar-item"><i class="fas fa-mail-bulk text-white"></i> <a href="" class="side-bar-link">My Posts</a></li>
            <li class="side-bar-item"><i class="fas fa-users text-primary"></i> <a href="" class="side-bar-link">Followers</a></li>
            <li class="side-bar-item"><i class="fas fa-user-cog text-white"></i> <a href="" class="side-bar-link">Settings</a></li>
            <li class="side-bar-item"><i class="far fa-bell text-warning"></i> <a href="" class="side-bar-link">Notifications</a></li>
        </ul>
        <div class="side-bar-footer">
            <h5 class="text-danger"><i class="fas fa-blog text-warning"></i> StoryTime</h5>User's safety is our top priority.
        </div>
    </div>
@endsection

@section('content')
    <div class="profile-container">
        <header class="header__profile__nav">
            <nav class="profile-nav">
                <ul class="profile-nav-list">
                    <li class="profile-item"><a href="" class="profile-link">General</a></li>
                    <li class="profile-item"><a href="" class="profile-link">Password</a></li>
                    <li class="profile-item"><a href="" class="profile-link">Language</a></li>
                    <li class="profile-item"><a href="" class="profile-link">Policies</a></li>
                </ul>
            </nav>
            <hr class="profile-navbar-divider">
        </header>

        <main class="profile__main__content">
            <div class="profile-info-container">
                <h1 class="personal__info">Personal Information</h1>
                <form action="" class="profile-info">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" value="{{ Auth::user()->name ?? 'Guest' }}" disabled>
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" value="{{ Auth::user()->name ?? 'Guest' }}" disabled>
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email ?? 'Guest' }}" disabled>
                    <label for="city">City</label>
                    <input type="text" name="city" value="Calamba City, Laguna 4027, Philippines" disabled>
                </form>
            </div>
            <div class="profile__avatar">
    
                    <img src="../../../storage/profile_images/{{ Auth::user()->profile_img ?? 'no_profile_image.png' }}" alt="">
                    <caption><h5 class="profile-user-avatar-name">{{ Auth::user()->name ?? 'Guest' }}</h5></caption>
                    <p class="profile-img-description">
                        <a href="" class="btn btn-primary edit-profile-img">Change Profile Info</a>
                        <a href="/user/edit-profile" class="btn btn-warning update">Continue</a>
                        <button class="btn btn-danger cancel">Cancel</button>
                    </p>
            </div>
        </main>
        
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection