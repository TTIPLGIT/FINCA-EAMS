<!-- Notes -->
<div class="form-group {{ $errors->has('remarks') ? ' has-error' : '' }}">
    <label for="remarks" class="col-md-3 control-label">{{ trans('admin/infrastructures/form.remarks') }}</label>
    <div class="col-md-7 col-sm-12">
        <textarea class="col-md-6 form-control" id="remarks" name="remarks">{{ Input::old('remarks', $item->remarks) }}</textarea>
        {!! $errors->first('remarks', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>
