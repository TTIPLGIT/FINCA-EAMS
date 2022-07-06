<!-- Name -->
<div class="form-group {{ $errors->has('revenue_village') ? ' has-error' : '' }}">
    <label for="revenue_village" class="col-md-3 control-label">{{ $translated_name }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'revenue_village')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="revenue_village" id="revenue_village" value="{{ Input::old('revenue_village', $item->revenue_village) }}" />
        {!! $errors->first('revenue_village', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>