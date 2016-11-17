@extends('master')
@section('content')
    <div id="content">
        <h1>{{ trans('custom.title.privacy-policy') }}</h1>
        {!! trans('privacy-policy.body') !!}
    </div>
@endsection
