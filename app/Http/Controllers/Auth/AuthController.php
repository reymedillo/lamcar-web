<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\MessageBag;
use Auth;

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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    /**
     * Login as Admin instance.
     *
     * @param  array  $data
     * @return Admin
     */
    protected function getLogin(Request $request)
    {
        return view('admin.auth.login');
    }

    /**
     * Login as Admin instance after a Valid Credentials.
     *
     * @param  array  $data
     * @return Admin
     */
    protected function postLogin(Request $request)
    {
        
        Session::forget('access_token');
        Session::forget('refresh_token');
         
        $errors = null;
        $data  = $this->admin->getAccessToken($request->all());
        if(!empty($data->access_token) && !empty($data->expired_date) && !empty($data->refresh_token)) {
            
            Session::set('access_token',['value'=>$data->access_token,'expires'=>$data->expired_date]);
            Session::set('refresh_token',$data->refresh_token);
            Session::set('user',(object)array('id'=>$data->admin_id,'name'=>$data->admin_name) );
              
            return redirect('/admin/orders');
        }
        
        if(\Session::get('api_error') !== null){
            $messages = new MessageBag();
            if(isset(Session::get('api_error')->errors)) { 
                $errors = \Session::get('api_error')->errors;  
                foreach($errors AS $key => $val){ 
                    foreach($val AS $k => $v){
                         $messages->add($key, $v);
                    }
                }
                $errors = $messages;
            } else {
                $errors = $messages->add('error', \Session::get('api_error')->message);      
            }   
        }
        
        return view('admin.auth.login')->with(compact('errors'));
    }
          
    protected function logout()
    {
        \Session::forget('access_token');
        \Session::forget('refresh_token');
        \Session::forget('user');
        return redirect()->to('/admin/auth/login');
    }
}
