 @extends('master')
 @section('content')

 <form class="form-horizontal" method="post" action="{{ getenv('APP_URL') }}/test-push">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" id="inputToken"/>
    <div class="form-group">
        <label class="col-xs-2">Order ID</label>
        <div class="col-xs-2">
            <input type="number" class="form-control" required name="order_id" value="">
            <br>
            <input type="checkbox" name="push[]" id="request" value="REQUEST">&nbsp;&nbsp;&nbsp;<label for="request">Request</label><br>
            <input type="checkbox" name="push[]" id="accept" value="ACCEPT">&nbsp;&nbsp;&nbsp;<label for="accept">Accept</label><br>
            <input type="checkbox" name="push[]" id="arrive" value="ARRIVE">&nbsp;&nbsp;&nbsp;<label for="arrive">Arrive</label><br>
            <input type="checkbox" name="push[]" id="cancel" value="CANCEL">&nbsp;&nbsp;&nbsp;<label for="cancel">Cancel</label><br>
            <input type="checkbox" name="push[]" id="decline" value="DECLINE">&nbsp;&nbsp;&nbsp;<label for="decline">Decline</label>
            
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Push"/>
</form>
<br><br><br>
@if(isset($api))
    @foreach($push_input as $input)
        <label>{{$input}}</label>
        <pre style="text-align: left;">{{$api->$input}}</pre>
    @endforeach
@endif
@endsection

