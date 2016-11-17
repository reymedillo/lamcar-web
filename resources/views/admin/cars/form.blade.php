<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label class="control-label col-xs-2">Car #</label>
    <div class="col-xs-10">
        <input type="text" class="form-control" name="number">
    </div>
</div>
<div class="form-group">
    <label for="inputPassword" class="control-label col-xs-2">Password</label>
    <div class="col-xs-10">
        <input type="password" class="form-control" autocomplete="off" name="password">
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword" class="control-label col-xs-2">Confirm Password</label>
    <div class="col-xs-10">
        <input type="password" class="form-control" autocomplete="off" name="password_confirmation">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-xs-2">Note</label>
    <div class="col-xs-10">
        <textarea class="form-control" rows="5" name="note"></textarea >
    </div>
</div>
