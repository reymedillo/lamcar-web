<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;
use App\ApiModel;

class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'valid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function __construct(ApiModel $api) {
        
        $this->api = $api;
        
    }
    
    public function getAccessToken($data) {

        $res = $this->api->call('POST',env('API_URL', false).'/admins/auth/login',$data);

        if($res->getStatusCode() != 200){

            Session::flash('api_error',$res->getBody());
            
            return false;
            
        }
                 
        return $res->getBody();
         
    }
    
    public function getReissueToken($id, $data)
    {
        $res = $this->api->callByAuth('POST',env('API_URL').'/admins/'.$id.'/refresh', $data);
        return $res->getBody();
    }

    public function getBusinessHour() {
        $res = $this->api->callByAuth("GET", env('API_URL')."/business_hour");
        if($res->getStatusCode() != 200){

            \Session::flash('api_error',$res->getBody());

            return false;
        }

        return $res->getBody()->business_hour;
    }

    public function editBusinessHour($request) {
        $res = $this->api->callByAuth("POST", env('API_URL')."/business_hour",$request->all());
        if($res->getStatusCode() != 200){

            \Session::flash('message', $res->getBody()->message);
            \Session::flash('errors', $res->getBody()->errors);
            return false;
        }
        return $res->getBody();
    }

    public function Testpush($data) {
       $res = $this->api->call("POST", env('API_URL')."/test-push",$data);
       return $res->getBody()->api;
    }
    
}
