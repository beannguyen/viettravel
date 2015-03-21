<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 *
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;
		$this->subject = 'Your Password Reset Link'; //  < --JUST ADD THIS LINE
		$this->middleware('guest');
	}

	/**
    * Display the password reminder view.
    *
    * @return Response
    */
	public function index()
	{
		return view('auth.password');
	}

	public function postRemind(Request $request)
	{
		$response = $this->passwords->sendResetLink($request->only('email'), function($message) {
			$message->subject($this->subject);
		});

		switch ($response) {
			case PasswordBroker::RESET_LINK_SENT:
				return response()->json(['status' => 'success', 'response' => $response]);
			case PasswordBroker::INVALID_USER:
				return response()->json(['status' => 'invalid_user', 'response' => $response]);
			case PasswordBroker::INVALID_TOKEN:
				return response()->json(['status' => 'invalid_token', 'response' => $response]);
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);
		return view('auth.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = $this->passwords->reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);
			$user->save();
		});

		switch ($response)
		{
			case PasswordBroker::INVALID_PASSWORD:
				return response()->json(['status' => 'invalid_password']);
			case PasswordBroker::INVALID_TOKEN:
				return response()->json(['status' => 'invalid_token']);
			case PasswordBroker::INVALID_USER:
				return response()->json(['status' => "invalid_email"]);
			case PasswordBroker::PASSWORD_RESET:
				return response()->json(['status' => 'success']);
		}
	}
}
