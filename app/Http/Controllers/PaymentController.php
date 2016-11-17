<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Payment;

class PaymentController extends Controller
{
    protected $payment;
    
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;    
    }
    
    protected function getShow($token) {
        $payment = $this->payment->getPayment($token);
        if($payment == false){
            return view('errors.payment');
        }
        if(!empty($payment->transaction_response_code)){
            return redirect('payments/'.$token.'/result');
        }
        return view('payments.show', compact('payment'));
    }

    protected function postCharge($token, Request $request) {
        $res = $this->payment->charge($token, $request);
        if($res){
            return redirect('payments/'.$token.'/result');
        } else {
            $request->flash();
            return self::getShow($token);
        }
    }

    protected function getResult($token) {
        $result = $this->payment->getResult($token);
        return view('payments.result', compact('result'));
    }
}
