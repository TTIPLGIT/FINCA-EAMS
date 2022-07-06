<!-- Name -->
<div class="form-group {{ $errors->has('life_of_assets') ? ' has-error' : '' }}">
    <label for="life_of_assets" class="col-md-3 control-label">{{ $translated_name }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'life_of_assets')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="life_of_assets" id="life_of_assets" value="{{ Input::old('life_of_assets', $item->life_of_assets) }}" />
        {!! $errors->first('life_of_assets', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>