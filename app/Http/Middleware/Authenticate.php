<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Admin;


class Authenticate
{
    public function __construct(Admin $admin) {
        $this->admin = $admin;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

         if (!isset(Session::get('user')->id)) {
            $request->session()->flush();
            if ($request->ajax() || $request->wantsJson()){ 
                return redirect()->guest('401');
            }else{ 
                return redirect()->guest('/admin/auth/login');
            }
        }else{
            if(Session::has('access_token')) {
                if( strtotime(Session::get('access_token')['expires']) > time() ){ 
                    return $next($request);
                }   
                $pass_reissueToken = [
                    'refresh_token' => Session::get('refresh_token')
                ]; 
                $api = $this->admin->getReissueToken(
                    Session::get('user')->id,
                    $pass_reissueToken
                );
                if($api == false) {
                    Session::flush();
                    return redirect('/auth/login');
                }
                Session::forget('access_token');
                Session::set('access_token',[
                    'value'   => $api->access_token,
                    'expires' => $api->expired_date
                ]);
                return $next($request);
            }   
        }
        return redirect('/auth/login');
        
    }
    
}
