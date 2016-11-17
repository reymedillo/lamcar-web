<div id="driver-register-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="deleteModal">Register Driver</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="driver-register">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" id="inputToken"/>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Login ID</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" name="loginid" id="inputLoginId">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Name</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" name="name" id="inputName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Password</label>
                        <div class="col-xs-10">
                            <input type="password" class="form-control" name="password" id="inputPassword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2">Confirm Password</label>
                        <div class="col-xs-10">
                            <input type="password" class="form-control" name="password_confirmation" id="confirmInputPassword">
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
