<!-- Name -->
<div class="form-group {{ $errors->has('no_of_years_assets_use') ? ' has-error' : '' }}">
    <label for="no_of_years_assets_use" class="col-md-3 control-label">{{ $translated_name }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'no_of_years_assets_use')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="no_of_years_assets_use" id="no_of_years_assets_use" value="{{ Input::old('no_of_years_assets_use', $item->no_of_years_assets_use) }}" />
        {!! $errors->first('no_of_years_assets_use', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>