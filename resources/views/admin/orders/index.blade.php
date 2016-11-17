@extends('admin.master')
@section('content')
<!-- orders -->
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="btn-group" style="margin-bottom: 15px;">
                <a href="/admin/orders" type="button" class="btn {{ !app('request')->input('status') ? 'btn-primary' : 'btn-default'}}" id="order_currently">Currently</a>
                <a href="?status=all" type="button" class="btn {{ app('request')->input('status') ? 'btn-primary' : 'btn-default'}}" id="order_all">All</a>
            </div>
        </div>
    </div>
    @if(count($orders)>0)
        @foreach($orders as $key => $order)
        <div class="col-md-12">
            <div class="row">
                <ul class="list-group">
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="panel-info">
                                    <p><strong>ID</strong> : {{ $order->id }}</p>
                                    <p><strong>ORDER DATE</strong> : {{ $order->order_date }}</p>
                                    <p><strong>STATUS</strong> : {{ trans('custom.status.'.$order->status) }}</p>
                                    <p><strong>PICKUP</strong> : {{ $order->dropoff_location }}&nbsp;&nbsp;<strong>DROPOFF</strong> : {{ $order->dropoff_location }}</p>
                                    <p><strong>CAR #</strong> : {{ $order->car_number }}</p>
                                </div>
                                <div class="view-detail-btn pull-right">
                                    <a id="show{{ $order->id }}" class="btn btn-default btnOrder" href="/admin/orders/{{ $order->id }}">See Detail</a>
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
                                No Orders
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>    
    @endif
        <div class="col-md-12">
            <div class="row">
            @if(count($pagination)>0)
                <ul class="pagination">
                @if(($pagination->current_page - 1) != null)
                    <li>
                        <a href="{{ route('orders',array_merge($status, ['page'=>($pagination->current_page - 1)])) }}">&laquo;</a>
                    </li>
                @else
                    <li class="disabled"><a>&laquo;</a></li>
                @endif
                @for($i=1; $i<=$pagination->last_page; $i++)
                <li class="{{ $pagination->current_page == $i ? 'active' : false}}">
                    <a href="{{route('orders',array_merge($status, ['page'=>$i]))}}">{{$i}}</a>
                </li>
                @endfor
                @if(($pagination->current_page + 1) <= $pagination->last_page)
                    <li><a href="{{ route('orders',array_merge($status, ['page'=>($pagination->current_page + 1)])) }}">&raquo;</a></li>
                @else
                    <li class="disabled"><a>&raquo;</a></li>
                @endif
                </ul>
            @endif
        </div>
    </div>
</div>
<!-- end orders -->
<!-- modal -->
<div id="myModal"></div>
<script type="text/javascript"> 
$(function(){ 
    $("[id^=show]").on('click', function () { 
        var url = $(this).attr("href"); 
        $('#myModal').load(url,function(result){ 
            $('#myModal #show-modal').modal('show'); 
        }); 
        return false; 
    }); 
});
</script>
@endsection
