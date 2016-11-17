@extends('payments.master')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">
            <ul>
            @foreach (Session::get('errors') as $errors)
                @foreach ($errors as $error)
                    <li>{{ $error }}</li> 
                @endforeach
            @endforeach
            </ul>
        </div>
    @endif
    @if($payment) 
        @if($payment->status == 1) 
            <form class="form-horizontal" method="post" action="{{ getenv('APP_URL') }}/payments/{{ $payment->token}}">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" id="inputToken"/>
                <div class="form-group">
                    <label class="col-xs-2">{{ trans('custom.order-id') }}</label>
                    <div class="col-xs-2">{{ $payment->order_id }}</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2">{{ trans('custom.pickup-location') }}</label>
                    <div class="col-xs-2">{{ $payment->pickup_location }}</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2">{{ trans('custom.dropoff-location') }}</label>
                    <div class="col-xs-2">{{ $payment->dropoff_location }}</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2">{{ trans('custom.distance') }}</label>
                    <div class="col-xs-2">{{ $payment->distance }} mile</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2">{{ trans('custom.fare') }}</label>
                    <div class="col-xs-2">{{ $payment->fare }} $</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2">{{ trans('custom.email') }} ({{ trans('custom.optional') }})</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2">{{ trans('custom.card-no') }}</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control" name="cardNumber" value="{{ old('cardNumber') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2">{{ trans('custom.card-expired-date') }}</label>
                    <div class="col-xs-1">
                        <input type="text" class="form-control" name="cardExpirationDate" value="{{ old('cardExpirationDate') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2">{{ trans('custom.card-security-code') }}</label>
                    <div class="col-xs-1">
                        <input type="text" class="form-control" name="cardCode" value="{{ old('cardCode') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2">{{ trans('custom.card-name') }}</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control" name="cardName" value="{{ old('cardName') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10" style="border:1px solid #ccc;margin:auto 15px;overflow:auto;padding:10px;height:300px;width:auto;">
                        <p style="margin:0;">{!! trans('terms-and-conditions.body') !!}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12" style="text-align:center;">
                        <input type="checkbox" name="service_term" value="1">
                        <label style="padding-left:5px;position:relative;top:-2px;width:auto !important;">{{trans('custom.terms-and-conditions-agree') }}</label>
                    </div>
                </div>
                <div style="margin-bottom:10px;">
                    <input type="submit" id="payment-btn" class="btn btn-primary" value="{{ trans('custom.payment') }}"/>
                </div>
                <div>
                    <p id="pleasewait" style="display:none;height:44px;text-align:center;"><img src="{{URL::asset('images/loading.gif')}}" height="18" /><i>Please wait . . .</i></p>
                </div>
                <div>
                    <a id="backtoapp" class="btn btn-primary" href="http://back-to-app">{{ trans('custom.back-to-app') }}</a>
                </div>
                <div>
                    <span id="backtoapp2" class="btn btn-primary" style="background:#aaa !important;cursor:default;display:none;">{{ trans('custom.back-to-app') }}</span>
                </div>
            </form>
        @else
            <p><strong>ID-{{ $payment->id }}</strong></p>
            <p><strong>Payment Error</strong></p>
        @endif
    @else
        <p><strong>Payment Error</strong></p>
    @endif
@endsection
