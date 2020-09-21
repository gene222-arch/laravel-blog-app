<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfilesController extends Controller
{

    public function __construct () {

        $this->middleware('auth')->except(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // echo '<pre>';
        // var_dump(Auth::user());
        // echo '</pre>';
        return view('auth.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('auth.recent_login', ['user' => User::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('auth.edit_profile');
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
        $request->validate([
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::id()],
            'profile_image' => ['image', 'mimes:png,jpg,jpeg', 'max:1999']
        ]);

        if ( $request->hasFile('profile_image') ) {

            $fullFileName = $request->file('profile_image')->getClientOriginalName();
            $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
            $extension = $request->file('profile_image')->extension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $pathToStore = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);

        } else {

            $fileNameToStore = 'no_profile_image.png';
        }


        $currentUser = User::find($id);
        $currentUser->firstname = $request->input('firstname');
        $currentUser->lastname = $request->input('lastname');
        $currentUser->email = $request->input('email');

        if ( $request->hasFile('profile_image') ) {

            Storage::delete('public/profile_images/' . $currentUser->profile_img);
            $currentUser->profile_img = $fileNameToStore;
        }
        
        $currentUser->save();

        return redirect('/user/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
