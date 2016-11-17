<div id="car-register-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="deleteModal">Register</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="car-register">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" id="inputToken"/>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Car #</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" name="number" id="inputNumber">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Type</label>
                        <div class="col-xs-10">
                            <select class="form-control" id="inputCarType">
                                <option value=""></option>
                                @foreach($car_types as $type)
                                <option value="{{$type->id}}">{{$type->car_type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Note</label>
                        <div class="col-xs-10">
                            <textarea class="form-control" style="resize:none" rows="5" name="note" id="inputNote"></textarea >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-success pull-right">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
