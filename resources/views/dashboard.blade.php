@extends('layouts.main')

@section('pageTitle')
    Post
@endsection

@section('content')
<div class="container pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header bg-warning"><center><strong>My Posts</strong></center></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="row">   
                                @forelse ($posts as $post)
                                    
                                    <div class="col-md-4 col-sm-4 d-flex py-2">
                                        <div class="card text-center">
                                            <img class="card-img-top lazyload" data-src="/storage/cover_images/{{ $post->cover_images ?? '' }}" alt="">
                                            <div class="card-body">
                                                <h5 class="card-title"><strong>{{ $post->title }}</strong></h5>
                                                <p class="card-text">{!! Str::limit($post->body, 100) !!}</p>
                                            </div>
                                            <a href="/posts/{{ $post->id }}" class="btn btn-outline-secondary" role="button">See more</a>
                                            <div class="card-footer bg-dark text-light mt-2">
                                                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}
                                            </div>
                                            </div>               
                                    </div>
                        
                                @empty
                                    No Posts
                                @endforelse   

                        </div>    
        
                </div>
            </div>
        </div>
    </div>
</div>

<a href="/posts/create"><i class="fas fa-plus create-post fa-3x rounded-circle" title="Create Post"></i></a>
@endsection
