<?php namespace App\Http\Controllers;

class DashboardController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	protected $cUser;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->cUser = $this->getUser();
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		// init data to view
		$data = array();

		// page logical

		// page title
		$data['page_title'] = "Dashboard | VietTravel Applications";
		$data['page_name'] = "Dashboard";
		$data['page_description'] = "statistics & reports";
		$data['c_user'] = $this->cUser;
		$data['tab'] = array(
			'current' => 'dashboard-nav',
			'sub' => 'undefined'
		);
		// send plugins file
		$data['styles'] = array();
		$data['scripts'] = array();
		return view('backend.home')->with('data', $data);
	}

}
