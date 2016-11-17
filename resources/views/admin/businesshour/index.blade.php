@extends('admin.master')

@section('content')

<div class="form-group">
    <label class="col-xs-2">Timezone</label>
    <div class="col-xs-2">{{ $api->time_zone }}</div>
</div>
<br>
<div class="form-group">
    <label class="col-xs-2">Open Time</label>
    <div class="col-xs-2">{{ $api->open_time }}</div>
</div>
<br>
<div class="form-group">
    <label class="col-xs-2">Close Time</label>
    <div class="col-xs-2">{{ $api->close_time }}</div>
</div>
<br>
<div class="form-group">
<button class="btn btn-primary" onclick="window.location.href='{{ url('/admin/edit-business-hour') }}'">Update</button>
</div>
<br><br><br>
@endsection
