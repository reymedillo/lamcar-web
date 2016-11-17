<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Order;
use App\Helpers;

class OrderController extends Controller
{
    protected $order;
    
    public function __construct(Order $order)
    {
        $this->order = $order;    
    }
    
    protected function getIndex(Request $request)
    {
        $status = array();
        $params = array();
        $params['offset'] = config("define.perPage");
        
        if($request->input('status')) {
            $params['status'] = $request->input('status');
            $status = ['status' => $request->input('status')];
        }

        if($request->input('page')){ 
           $params['page'] = $request->input('page');
        }
        
        $temp_Orders = $this->order->getOrders($params);             
        
        $orders = $temp_Orders['orders'];
        $pagination = $temp_Orders['pagination'];
           
        return view('admin.orders.index', compact('orders', 'status', 'pagination'));
    }

    protected function getShow($orderId)
    {
        $order = $this->order->getOrder($orderId);
        return view('admin.orders.show', compact('order'));
    }

    protected function getSendPush($orderId)
    {
        return response()->json($this->order->sendPush($orderId), 200);
    }
}
