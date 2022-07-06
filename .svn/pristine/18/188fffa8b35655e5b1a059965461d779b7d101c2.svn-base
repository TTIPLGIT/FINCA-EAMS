<!-- Notes -->
<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="description" class="col-md-3 control-label">{{ trans('admin/infrastructures/form.description') }}</label>
    <div class="col-md-7 col-sm-12">
        <textarea class="col-md-6 form-control" id="description" name="description">{{ Input::old('description', $item->description) }}</textarea>
        {!! $errors->first('description', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>
