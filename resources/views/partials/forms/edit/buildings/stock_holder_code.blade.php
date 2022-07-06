<!-- Name -->
<div class="form-group {{ $errors->has('stock_holder_code') ? ' has-error' : '' }}">
    <label for="stock_holder_code" class="col-md-3 control-label">{{ $translated_name }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'stock_holder_code')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="stock_holder_code" id="stock_holder_code" value="{{ Input::old('stock_holder_code', $item->stock_holder_code) }}" />
        {!! $errors->first('stock_holder_code', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>