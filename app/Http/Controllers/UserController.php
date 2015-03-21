<?php namespace App\Http\Controllers;

use App\User;

class UserController extends Controller {

    protected $user;
    protected $cUser;

    public function __construct()
    {
        // model
        $this->user = new User();
        $this->cUser = $this->getUser();
    }

    /**
     * Show all user
     *
     */
    public function allUser()
    {
        // init data to view
        $data = array();

        /**
         * page logic
         */
        $data['all_users'] = $this->user->allUser();

        // page title
        $data['page_title'] = "Users Management - Dashboard | VietTravel Applications";
        $data['page_name'] = "Users Management";
        $data['page_description'] = "manager all users";
        $data['c_user'] = $this->cUser;
        $data['tab'] = array(
            'current' => 'memebers-nav',
            'sub' => 'sub-all-users'
        );
        // send plugins file
        $data['styles'] = array();
        $data['scripts'] = array();
        return view('backend.user.all')->with('data', $data);
    }

    public function addUser()
    {
        // init data to view
        $data = array();

        /**
         * page logic
         */

        // page title
        $data['page_title'] = "Users Management - Dashboard | VietTravel Applications";
        $data['page_name'] = "Users Management";
        $data['page_description'] = "add new user";
        $data['c_user'] = $this->cUser;
        $data['tab'] = array(
            'current' => 'memebers-nav',
            'sub' => 'sub-add-user'
        );
        // send plugins file
        $data['styles'] = array();
        $data['scripts'] = array();
        return view('backend.user.add')->with('data', $data);
    }
}