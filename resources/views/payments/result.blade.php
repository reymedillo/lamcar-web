@extends('payments.master')
@section('content')
<div class="paysuccess">
@if($result == "success")
    <p><strong>決済完了しました。</strong></p>
    <p><strong>ドライバー決定のメッセージが届きますので、アプリに戻ってお待ちください。</strong></p>
    @else
    <p><strong>決済に失敗しました。</strong></p>
    @endif
    <div><a class="btn btn-primary" href="http://back-to-app">アプリに戻る</a></div>
@endsection
</div>
