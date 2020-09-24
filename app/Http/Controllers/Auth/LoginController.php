<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override authenticated function.
     * Do something once user is logged in
     * @return void
     */
    protected function authenticated (Request $request, $user)
    {   
        $user->update([
            'last_logged_in' => date("Y-m-d H:i:s", time()) 
        ]);
    }

    /**
     * Override showLoginForm function.
     * Do something once user is logged in
     * @return void
     */
    public function showLoginForm () {

        return view('auth.login', [
                'users' => User::select('*')->latest()->take(4)->get()
            ]);
    }


    public function logout () {

        Auth::logout();
        return redirect('/login');
    }

    
}
