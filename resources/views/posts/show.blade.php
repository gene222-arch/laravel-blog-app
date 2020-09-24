@extends('layouts.posts')

@section('pageTitle')
    Post
@endsection

@section('content')

    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active image" href="#">Image</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link data" href="#">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/posts"><i class="fas fa-backward" title="Go Back"></i></a>
                </li>
            </ul>
        </div>
        <div class="card-image">
            <img src="/storage/cover_images/{{ $post->cover_images }}" alt="" class="img-fluid py-2">
            <h5 class="card-title mt-4"><strong>{{ $post->title }}</strong></h5>
        </div>
        <div class="card-body">
            <p class="card-text">{!! $post->body !!}</p>
        </div>
        <div class="card-footer text-muted">
            {{ date('Y, M d h:i:s A', strtotime($post->created_at)) }} by: {{ $post->user->firstname ?? 'Unknown' }}
        </div>
    </div>

    @if ( Auth::id() === $post->user_id )

        <center class="py-2">
            {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST']) !!}
            @csrf
            @method('DELETE')

            {{-- Edit --}}
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning text-dark" ><i class="far fa-edit"></i> Edit</a>
            {{-- Delete   --}}
            <button type="submit" class="btn btn-danger delete-post"><i class="far fa-trash-alt"></i> Delete</button>
        {!! Form::close() !!} 
        </center>
               
    @endif

{!! Form::close() !!}
    
@endsection

@section('scripts')
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection