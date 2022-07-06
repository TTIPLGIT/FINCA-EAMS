<!-- Name -->
<div class="form-group {{ $errors->has('year_of_acquisition') ? ' has-error' : '' }}">
    <label for="year_of_acquisition" class="col-md-3 control-label">{{ $translated_name }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'year_of_acquisition')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="year_of_acquisition" id="year_of_acquisition" value="{{ Input::old('year_of_acquisition', $item->year_of_acquisition) }}" />
        {!! $errors->first('year_of_acquisition', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>