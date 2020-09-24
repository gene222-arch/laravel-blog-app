@extends('layouts.posts')

@section('pageTitle')
    Edit
@endsection

@section('content')

    <h1 class="text-center">Edit</h1>

    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'enctype' => 'multipart/form-data']) !!}
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>$post-
            <input type="text" value="{!! >title ?? old('title') !!}" name="title" class="form-control @error('title') is-invalid @enderror">
            
            @error('title')
                <div class="invalid-feedback">{{ $message ?? '' }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" value="{!! $post->body ?? old('body') !!}" class="form-control @error('body') is-invalid @enderror" id="textarea-ckeditor" cols="30" rows="10">{!! $post->body ?? old('body') !!}</textarea>
            
            @error('body')
                <div class="invalid-feedback">{{ $message ?? '' }}</div>
            @enderror 
        </div>

        <input type="file" name="cover_images" id="" class="form-control @error('cover_images') is-invalid @enderror mb-3 p-1">
        
        @error('cover_images')
             <div class="invalid-feedback">{{ $message ?? '' }}</div>
        @enderror 

        {{ Form::submit('Update Post', ['class' => 'form-control btn btn-outline-primary']) }}

    {!! Form::close() !!}
@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection