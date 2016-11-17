<div id="view-driver-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Driver Detail</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" id="updateToken"/>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Login ID</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" name="loginid" id="updateLoginId">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Name</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" name="name" id="updateName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Password</label>
                        <div class="col-xs-10">
                            <input type="password" class="form-control" name="password" id="updatePassword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Confirm Password</label>
                        <div class="col-xs-10">
                            <input type="Password" class="form-control" name="password_confirmation" id="confirmUpdatePassword">
                        </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-12">
                          <div><button type="submit" class="btn btn-success pull-right" id="edit_driver">Edit</button></div>
                          <div><button  class="btn btn-danger pull-right" id="delete_driver">Delete</a></div>                      
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
