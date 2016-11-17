<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
        if (isset(\Session::get('user')->id) && \Route::getCurrentRoute()->getName() == 'logout'){
    
            \Session::forget('access_token');
            
            \Session::forget('refresh_token');
            
            \Session::forget('user');
                        
            \Session::set('msg', [ 'success' => ['1' => 'Logout Successfully']]);
       
        }elseif (isset(\Session::get('user')->id)  && (\Route::getCurrentRoute()->getName() == 'login' 
                                                         || \Route::getCurrentRoute()->getName() == 'welcome')){
            
            \Session::forget('msg');
            
            return redirect('/admin/orders');           
            
        }elseif(isset(\Session::get('user')->id)){
        
            \Session::forget('msg');
        
        }
      
        return $next($request);
        
    }
}
