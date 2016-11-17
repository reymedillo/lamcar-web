<div id="show-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Order Detail</h4>
            </div>
            <div class="modal-body edit-content">
                <table class="table table-hover" id="orderTable">
                    <tr><td>ORDER #</td><td>{{ $order->id }}</td></tr>
                    <tr><td>STATUS</td><td>{{ trans('custom.status.'.$order->status) }}</td></tr>
                    <tr><td>NAME</td><td>{{ $order->name }}</td></tr>
                    <tr><td>ORDER DATE</td><td>{{ $order->order_date }}</td></tr> 
                    <tr><td>PICKUP</td><td>{{ $order->pickup_location }}</td></tr>
                    <tr><td>PICKUP LOCATION</td><td>{{ $order->pickup_latitude}},{{ $order->pickup_longitude }}</td></tr>
                    <tr><td>PICKUP DETAIL</td><td>{{ $order->pickup_location_detail }}</td></tr>    
                    <tr><td>DROPOFF</td><td>{{ $order->dropoff_location }}</td></tr>
                    <tr><td>DROPOFF LOCATION</td><td>{{ $order->dropoff_latitude }},{{ $order->dropoff_longitude }}</td></tr>
                    <tr><td>DROPOFF DATE</td><td>{{ $order->dropoff_date }}
                    <tr><td>CAR # @if($order->status == config('define.status.payment_completion'))<small style="float:right;"><a data-toggle="modal" data-target="#resend-modal">Resend Message </a></small>@endif</td><td>{{ $order->car_number }}</td></tr>
                    <tr><td>CAR TYPE</td><td>{{ $order->car_type_name }}</td></tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@include('admin.orders.resend-modal')
@include('admin.orders.send-completion-modal')
<script type="text/javascript">
$(function() {   
    var orderId = {{ $order->id }};
    // sendpush
    $('#yes-resend').click(function(e) {
        $.ajax({
            url: '/admin/orders/' + orderId + '/sendpush',
            data: {format: 'json'},
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if(!response.errors) {
                    $('#send-completion-modal').modal('show');
                }
            },
        })
    });
});
