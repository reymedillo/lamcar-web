
<div id="view-car-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Car Detail</h4>
            </div>
            <div class="modal-body">
                 <form class="form-horizontal">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" id="updateToken"/>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Car #</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" name="number" id="updateNumber">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Type</label>
                        <div class="col-xs-10">
                            <select class="form-control" id="updateCarType">
                                <option value=""></option>
                                @foreach($car_types as $type)
                                <option value="{{$type->id}}">{{$type->car_type_name}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" class="form-control" name="number" id="inputCarType"> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Driver</label>
                        <div class="col-xs-10">
                            <select class="form-control" id="updateCarDriver">
                                @foreach($drivers as $driver)
                                <option  value="{{$driver->id}}">{{$driver->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Note</label>
                        <div class="col-xs-10">
                            <textarea class="form-control" style="resize: none" rows="5" name="note" id="updateNote"></textarea >
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12">
                          <div><button type="submit" class="btn btn-success pull-right" id="edit_car">Edit</button></div>
                          <div><button  class="btn btn-danger pull-right" id="delete_car">Delete</a></div>                      
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
