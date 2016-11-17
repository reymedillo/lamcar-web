@extends('master')
@section('content')

<section id="paymentForm" class="wrapper clearfix">
    <div class="mainWrap">
        <div class="pure-g">
            <div class="pure-u-1">
                <div class="pageTitle">Error Occuured</div>
                <div class="pure-u-1 form-row completionMsg">
                     {{ $message }} 
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End of #paymentForm -->
@endsection
