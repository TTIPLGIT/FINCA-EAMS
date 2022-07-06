<!-- No of Floor -->
<div class="form-group {{ $errors->has('no_of_floor') ? ' has-error' : '' }}">
    <label for="no_of_floor" class="col-md-3 control-label">{{ $translated_name }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'no_of_floor')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="no_of_floor" id="no_of_floor" value="{{ Input::old('no_of_floor', $item->no_of_floor) }}" />
        {!! $errors->first('no_of_floor', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>