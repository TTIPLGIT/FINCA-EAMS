<!-- Name -->
<div class="form-group {{ $errors->has('remaining_life') ? ' has-error' : '' }}">
    <label for="remaining_life" class="col-md-3 control-label">{{ $translated_name }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'remaining_life')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="remaining_life" id="remaining_life" value="{{ Input::old('remaining_life', $item->remaining_life) }}" />
        {!! $errors->first('remaining_life', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>