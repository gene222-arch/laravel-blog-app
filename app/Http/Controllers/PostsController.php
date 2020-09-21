<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;


class PostsController extends Controller
{   

    public function __construct () {

        $this->middleware('auth')->except(['show', 'index']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with([
            'posts' => Post::latest()->simplePaginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validateData = $request->validate([
            'title' => 'required|min:3',
            'body' => 'required',
            'cover_images' => 'image|max:1999|mimes:png,jpg,jpeg'
        ]);
        
        if ( $request->hasFile('cover_images') ) {

            $fullFileName = $request->file('cover_images')->getClientOriginalName();
            $fileNameOnly = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileExtension = $request->file('cover_images')->extension();
            $fileNameToStore = $fileNameOnly . '_' . time() . '.' . $fileExtension; 

            $storePath = $request->file('cover_images')->storeAs('public/cover_images', $fileNameToStore);
            // $request->file('cover_images')->move(public_path('files'), $filename);

        } else {

            $fileNameToStore = 'no_image.png';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_images = $fileNameToStore;
        $post->user_id = Auth::id() ?? 0;
        $post->save();

        return !$validateData ? $request->flash() : redirect('/posts')->with('success', 'Posted Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show')->with([
            'post' => Post::findOrFail($id) 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (Auth::id() !== $post->user_id ) {
            return redirect('/posts')->with('error', 'Unauthorized Access');
        } 

        return view('posts.edit')->with([
            'post' => Post::find($id)
        ]);       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3',
            'body' => 'required',
            'cover_images' => 'image|max:1999|mimes:png,jpg,jpeg'
        ]);

        if ( $request->hasFile('cover_images') ) {

            $fullFileName = $request->file('cover_images')->getClientOriginalName();
            $fileNameOnly = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileExtension = $request->file('cover_images')->extension();
            $fileNameToStore = $fileNameOnly . '_' . time() . '.' . $fileExtension;
            $storePath = $request->file('cover_images')->storeAs('public/cover_images/', $fileNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        
        if ( $request->hasFile('cover_images') ) {

            Storage::delete('public/cover_images/' . $post->cover_images);
            $post->cover_images = $fileNameToStore;
        }

        $post->save();

        return redirect('/posts/' . $id)->with('success', 'Successfuly Edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (Auth::id() !== $post->user_id ) {

            return redirect('/posts')->with('error', 'Unauthorized Access');
        } 

        $post->delete();
        return redirect('/posts')->with('success', 'Deleted Successfuly');
    }
}
