<?php

namespace App;

use Illuminate\Http\Response;
use App\ApiModel;

class Order extends ApiModel
{
    
    public function getOrders($params)
    {
        $res = $this->callByAuth("GET", env('API_URL')."/orders", $params);
        return [
            'orders' => $res->getBody()->orders,
            'pagination' =>  $res->getBody()->pagination
        ];
    }


    public function getOrder($orderId)
    {
        $res = $this->callByAuth("GET", env('API_URL')."/orders/". $orderId);
        if($res->getStatusCode() != 200){
            return false;
        }
        return $res->getBody()->order;
    }


    public function sendPush($orderId)
    {
        $res = $this->callByAuth("GET", env('API_URL', false)."/orders/{$orderId}/sendpush");
        return $res->getBody();
    }
    
}

