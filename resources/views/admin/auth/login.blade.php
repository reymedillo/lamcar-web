@extends('admin.master')
 
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div> 
          @elseif (isset(Session::get('msg')['errors']))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                @foreach (session('msg')['errors'] as $k => $v)
                  <li>{{ $v }}</li>
                @endforeach
                </ul>
            </div>
         @elseif (isset(Session::get('msg')['success']))           
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                @foreach (session('msg')['success'] as $k => $v)
                  <li>{{ $v }}</li>
                @endforeach
                </ul>
            </div>
          @endif
          {{\Session::forget('msg')}}
          <form class="form-horizontal" role="form" method="POST" action="/admin/auth/login">
            {{-- CSRF対策--}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <label class="col-md-4 control-label">Name</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password">
              </div>
            </div>

 
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember"> Remember Me
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                  Login
                </button>
              </div>
            </div>
          </form>
        </div><!-- .panel-body -->
      </div><!-- .panel -->
    </div><!-- .col -->
  </div><!-- .row -->
</div><!-- .container-fluid -->
@endsection

