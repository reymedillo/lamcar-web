 @extends('admin.master')
 @section('content')
 @if (count($errors) > 0)
    <div class="alert alert-success">
        <strong>Whoops!</strong> {{ $msg }}<br><br>
        <ul>
        @foreach ($errors as $hash)
            @foreach ($hash as $error)
                <li>{{ $error }}</li> 
            @endforeach
        @endforeach
        </ul>
    </div>
@elseif(isset($success))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{$success}}<br><br>
    </div>
@endif
 <form class="form-horizontal" method="post" action="{{ getenv('APP_URL') }}/admin/edit-business-hour">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" id="inputToken"/>
    <div class="form-group">
        <label class="col-xs-2">TimeZone</label>
        <div class="col-xs-2">
            <input type="text" class="form-control" name="time_zone" value="{{ $business_hr->time_zone }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-2">Open Time</label>
        <div class="col-xs-2">
            <input type="text" class="form-control" name="open_time" value="{{ $business_hr->open_time }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-2">Close Time</label>
        <div class="col-xs-2">
            <input type="text" class="form-control" name="close_time" value="{{ $business_hr->close_time }}">
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Update"/>
</form>
<br><br><br>
@endsection
