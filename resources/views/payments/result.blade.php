@extends('payments.master')
@section('content')
<div class="paysuccess">
@if($result == "success")
    <p><strong>Payment Success</strong></p>
    @else
    <p><strong>Payment Failure</strong></p>
    @endif
    <div><a class="btn btn-primary" href="http://back-to-app">アプリに戻る</a></div>
@endsection
</div>
