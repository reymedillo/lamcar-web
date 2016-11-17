<?php

namespace App;

class Helpers 
{
    
    public static function RedirectToLoginPageWithError($error) {
        
        \Session::forget('access_token');
        
        \Session::forget('refresh_token');
        
        \Session::forget('user');
        
        \Session::set('msg', [ 'errors' => $error]);
        
        return redirect()->guest('/admin/auth/login'); 
   
    }
  
}

