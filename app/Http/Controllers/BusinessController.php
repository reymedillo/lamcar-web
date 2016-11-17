<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;

class BusinessController extends Controller
{
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function getBusinessHr() {
        $api = $this->admin->getBusinessHour();
        return view('admin.businesshour.index', compact('api'));
    }

    public function editBusinessHr() {
        $business_hr = $this->admin->getBusinessHour();
        return view('admin.businesshour.edit', compact('business_hr'));
    }

    public function postEditBusinessHr(Request $request) {
        $api = $this->admin->editBusinessHour($request);
        $business_hr = $this->admin->getBusinessHour();

        if($api == false) {
            $request->flash();
            $errors = \Session::get('errors');
            $msg    = \Session::get('message');
            return view('admin.businesshour.edit')->with(compact('errors'))->with(compact('business_hr'))->with(compact('msg'));
        }
        return view('admin.businesshour.edit',['success'=>$api->result,'business_hr'=>$business_hr]);
    }
    
}
