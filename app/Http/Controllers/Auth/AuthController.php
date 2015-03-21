<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    public function login()
    {
        $remember = Input::get('remember');

        if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password'), 'active' => 1], $remember)) {

            return response()->json(['user' => Auth::user(), 'status' => 'success']);
        } else {
            return response()->json(['flash' => 'Username or Password are incorrect', 'status' => 'failed'], 500);
        }


    }

    public function logout()
    {
        Auth::logout();
        return redirect('auth/login')->with('flash', 'Logged Out!');
    }

}
