<!-- Name -->
<div class="form-group {{ $errors->has('rate_of_depreciation') ? ' has-error' : '' }}">
    <label for="rate_of_depreciation" class="col-md-3 control-label">{{ $translated_name }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'rate_of_depreciation')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="rate_of_depreciation" id="rate_of_depreciation" value="{{ Input::old('rate_of_depreciation', $item->rate_of_depreciation) }}" />
        {!! $errors->first('rate_of_depreciation', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>