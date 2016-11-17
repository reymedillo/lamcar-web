@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <form method="GET" action="/admin/cars">
                        <div class="input-group mg-btm-15">
                            <input type="text" class="form-control" placeholder="Search Car #&hellip;" name="search" value="@if (isset($prev_search['search'])){{$prev_search['search']}}@endif">
                            <span class="input-group-btn">
                                <button id="car-search" type="submit" class="btn btn-default">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <button class="btn btn-default pull-right" data-toggle="modal" data-target="#car-register-modal">Add New</button>
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
                                <p class="text-center"><strong>Number</strong></p>
                            </div>
                            <div class="col-md-2">
                                <p class="text-center"><strong>Type</strong></p>
                            </div>
                            <div class="col-md-2">
                                <p class="text-center"><strong>Driver</strong></p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
 

    @if(count($cars)>0)
        @foreach($cars as $key => $car)
        <div class="col-md-12">
            <div class="row">
                <ul class="list-group">
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-2">
                                    <p class="text-center">{{ $car->id }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center">{{ $car->number }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center">{{ $car->car_type_name }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center">{{ $car->driver_name }}</p>
                                </div>
                                <div class="view-detail-btn pull-right">
                                   <a class="btn btn-default btnOrder" id="{{$car->id}}" data-toggle="modal" data-target="#view-car-modal">View / Edit</a>
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
                                No Cars
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
                          <li><a href="{{route('cars',array_merge($prev_search, ['page'=>($pagination->current_page - 1)]))}}">&laquo;</a></li>
                   @else
                           <li class="disabled"><a>&laquo;</a></li>
                   @endif
                   @for($i=1; $i<=$pagination->last_page; $i++)
                   <li class="{{ $pagination->current_page == $i ? 'active' : false}}">
                       <a href="{{route('cars',array_merge($prev_search,['page'=>$i]))}}">{{$i}}</a>
                   </li>
                   @endfor

                   @if(($pagination->current_page + 1) <= $pagination->last_page)
                             <li><a href="{{route('cars',array_merge($prev_search, ['page'=>($pagination->current_page + 1)]))}}">&raquo;</a></li>
                   @else
                           <li class="disabled"><a>&raquo;</a></li>
                   @endif
                </ul>
        </div>
    </div>
    @endif
</div>
<!-- end cars -->

<!-- modal -->
@include('admin.cars.show')
@include('admin.cars.register-modal')
@include('admin.cars.modal-success')
@include('admin.cars.modal-fail')
@include('admin.cars.modal-prompt-delete')
@include('admin.cars.modal-delete-success')

<!-- script -->
<script type="text/javascript">$(window).load(function(){HIREAPP.cars()})</script>
@endsection
