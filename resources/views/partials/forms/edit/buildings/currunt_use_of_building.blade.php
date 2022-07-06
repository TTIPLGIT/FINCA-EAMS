<!-- Currunt_use_of_building -->
<div class="form-group {{ $errors->has('currunt_use_of_building') ? ' has-error' : '' }}">
    <label for="currunt_use_of_building" class="col-md-3 control-label">{{ $translated_name }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'currunt_use_of_building')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="currunt_use_of_building" id="currunt_use_of_building" value="{{ Input::old('currunt_use_of_building', $item->currunt_use_of_building) }}" />
        {!! $errors->first('currunt_use_of_building', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>