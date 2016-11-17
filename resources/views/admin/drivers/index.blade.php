@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <form method="GET" action="/admin/drivers">
                        <div class="input-group mg-btm-15">
                            <input type="text" class="form-control" placeholder="Search Driver Name&hellip;" name="search" value="@if (isset($prev_search['search'])){{$prev_search['search']}}@endif">
                            <span class="input-group-btn">
                                <button id="driver-search" type="submit" class="btn btn-default">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <button class="btn btn-default pull-right" data-toggle="modal" data-target="#driver-register-modal">Add New</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <ul class="list-group">
                <li>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-2">
                                <p class="text-center"><strong>ID</strong></p>
                            </div>
                            <div class="col-md-2">
                                <p class="text-center"><strong>Name</strong></p>
                            </div>
                            <div class="col-md-2">
                                <p class="text-center"><strong>CarNumber</strong></p>
                            </div>
                            <div class="col-md-2">
                                <p class="text-center"><strong>CarType</strong></p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
 
    @if(count($drivers)>0)
        @foreach($drivers as $key => $driver)
        <div class="col-md-12">
            <div class="row">
                <ul class="list-group">
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-2">
                                    <p class="text-center">{{ $driver->id }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center">{{ $driver->name }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center">{{ $driver->car_number }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center">{{ $driver->car_type_name }}</p>
                                </div>
                                <div class="view-detail-btn pull-right">
                                   <a class="btn btn-default btnOrder" id="{{$driver->id}}" data-toggle="modal" data-target="#view-driver-modal">View / Edit</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
    @else
        <div class="col-md-12">
            <div class="row">
               <ul class="list-group">
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                No Drivers
                            </div>
                        </div>
                  </li>
                </ul>
            </div>
        </div> 
    @endif
    @if($pagination)
        <div class="col-md-12">
        <div class="row">
            <ul class="pagination">
                   @if(($pagination->current_page - 1) != null)
                          <li><a href="{{route('drivers',array_merge($prev_search, ['page'=>($pagination->current_page - 1)]))}}">&laquo;</a></li>
                   @else
                           <li class="disabled"><a>&laquo;</a></li>
                   @endif
                   @for($i=1; $i<=$pagination->last_page; $i++)
                   <li class="{{ $pagination->current_page == $i ? 'active' : false}}">
                       <a href="{{route('drivers',array_merge($prev_search,['page'=>$i]))}}">{{$i}}</a>
                   </li>
                   @endfor

                   @if(($pagination->current_page + 1) <= $pagination->last_page)
                             <li><a href="{{route('drivers',array_merge($prev_search, ['page'=>($pagination->current_page + 1)]))}}">&raquo;</a></li>
                   @else
                           <li class="disabled"><a>&raquo;</a></li>
                   @endif
                </ul>
        </div>
    </div>
    @endif
</div>
<!-- end drivers -->

<!-- modal -->
@include('admin.drivers.show')
@include('admin.drivers.register-modal')
@include('admin.drivers.modal-success')
@include('admin.drivers.modal-fail')
@include('admin.drivers.modal-prompt-delete')
@include('admin.drivers.modal-delete-success')

<!-- script -->
<script type="text/javascript">$(window).load(function(){HIREAPP.drivers()})</script>
@endsection
