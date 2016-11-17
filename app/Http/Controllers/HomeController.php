<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth/login');
    }

    public function Unauthorized()
    {
        return view('errors/401');
    }

    public function getHowto() {
        return view('howto');
    }

    public function getPrivacyPolicy() {
        return view('privacy-policy');
    }

    /**
    TEST PUSH NOTIFICATE
    */
    public function Testpush() {
        return view('test-push');
    }
    public function postTestpush(Request $request) {
        $api = $this->admin->Testpush( $request->all() );
        return view('test-push')->with( compact('api') )->with('push_input',$request->input('push'));
    }

}
