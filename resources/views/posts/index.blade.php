@extends('layouts.posts')

@section('pageTitle')
    Posts
@endsection

@section('content')

    <div class="row landing__page__posts">
        @forelse ( $posts as $post )
              <div class="card text-center my-5 mr-auto ml-auto border-dark" style="width: 90%">
                <div class="row no-gutter">
                    <div class="col-md-4 col-sm-4">
                      <img class="card-img img-fluid lazyload" data-src="/storage/cover_images/{{ $post->cover_images }}" alt="...">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card-body">
                          <h5 class="card-title"><strong>{{ $post->title }} by: {{ $post->user->name ?? 'Unknown' }}</strong></h5>
                          <p class="card-text">{!! Str::limit($post->body, 150) !!}</p>
                        </div>
                        <a href="/posts/{{ $post->id }}" class="btn btn-outline-secondary mb-2" role="button">See more</a>
                    </div>
                    <div class="col-md-2 col-sm-2 p-0">
                      <div class="card-footer bg-dark text-light">
                        {{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}
                      </div> 
                    </div>
                </div> 
              </div>

        @empty
            <div class="no__post__found">
              <h1 class="no-post-text">No Post's</h1>
            </div>
        @endforelse
    </div>    

    <p class="py3">{{ $posts->links() }}</p>

@endsection
