<?php

namespace App;

use Illuminate\Http\Response;
use App\ApiModel;

class Payment extends ApiModel
{

    public function getPayment($token) {
        
        $res = $this->call("GET", env('API_URL')."/payments/". $token);

        if($res->getStatusCode() != 200){
            \Session::flash('api_error',$res->getBody());
            return false;
        }
        
        return $res->getBody()->payment;
        
    }

    public function getResult($token) {
        
        $res = $this->call("GET", env('API_URL')."/payments/". $token . "/result");

        if($res->getStatusCode() != 200){
            \Session::flash('api_error',$res->getBody());
            return false;
        }

        return $res->getBody()->result;
        
    }
    
    public function charge($token, $request) {

        $res = $this->call("POST", env('API_URL')."/payments/".$token, $request->all());

        if($res->getStatusCode() != 200){
            \Session::flash('message', $res->getBody()->message);
            \Session::flash('errors', $res->getBody()->errors);
            return false;
        }
        
        return $res->getBody()->result;
        
    }
    
}

