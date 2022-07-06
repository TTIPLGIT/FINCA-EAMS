@extends('layouts/edit-form', [
    'createText' => trans('admin/costcentres/general.create') ,
    'updateText' => trans('admin/costcentres/general.update'),
    'helpTitle' => trans('admin/costcentres/general.about_asset_depreciations'),
    'helpText' => trans('admin/depreciations/general.about_depreciations'),
    'formAction' => ($item) ? route('costcentres.update', ['costcentre' => $item->id]) : route('costcentres.store'),
])

{{-- Page content --}}
@section('inputFields')

<div class="form-group {{ $errors->has('costcode') ? ' has-error' : '' }}">
    <label for="costcode" class="col-md-3 control-label">
        {{ trans('admin/costcentres/general.costcode') }}
    </label>
    <div class="col-md-8{{  (\App\Helpers\Helper::checkIfRequired($item, 'costcode')) ? ' required' : '' }}">
        <div class="col-md-8" style="padding-left:0px">
            <input class="form-control" type="text" name="costcode" id="costcode" value="{{ Input::old('costcode', $item->costcode) }}" style="width: 280px;" />
        </div>
    </div>
    {!! $errors->first('costcode', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
</div>
<!-- <div class="form-group {{ $errors->has('dept_id') ? ' has-error' : '' }}">
    <label for="dept_id" class="col-md-3 control-label">
        {{ trans('admin/costcentres/general.dept_id') }}
    </label>
    <div class="col-md-8{{  (\App\Helpers\Helper::checkIfRequired($item, 'dept_id')) ? ' required' : '' }}">
        <div class="col-md-8" style="padding-left:0px">
            <input class="form-control" type="text" name="dept_id" id="dept_id" value="{{ Input::old('dept_id', $item->dept_id) }}" style="width: 280px;" />
        </div>
    </div>
    {!! $errors->first('dept_id', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
</div> -->

<!--  Department -->
              @include ('partials.forms.edit.department-select', ['translated_name' => trans('general.department'), 'fieldname' => 'dept_id'])
<div class="form-group {{ $errors->has('note') ? ' has-error' : '' }}">
    <label for="note" class="col-md-3 control-label">
        {{ trans('admin/costcentres/general.note') }}
    </label>
    <div class="col-md-8{{  (\App\Helpers\Helper::checkIfRequired($item, 'note')) ? ' required' : '' }}">
        <div class="col-md-8" style="padding-left:0px">
            <input class="form-control" type="text" name="note" id="note" value="{{ Input::old('note', $item->note) }}" style="width: 280px;" />
        </div>
    </div>
    {!! $errors->first('note', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
</div>
@stop
