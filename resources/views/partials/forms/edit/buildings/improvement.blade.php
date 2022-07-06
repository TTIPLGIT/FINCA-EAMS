<!-- Improvement -->
<div class="form-group {{ $errors->has('improvement') ? ' has-error' : '' }}">
    <label for="improvement" class="col-md-3 control-label">{{ $translated_name }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'improvement')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="improvement" id="improvement" value="{{ Input::old('improvement', $item->improvement) }}" />
        {!! $errors->first('improvement', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>