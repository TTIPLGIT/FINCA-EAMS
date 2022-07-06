@extends('layouts/edit-form', [
    'createText' => trans('admin/buildings/general.create') ,
    'updateText' => trans('admin/buildings/general.update'),
    'helpTitle' => trans('admin/buildings/general.about_buildings_title'),
    'helpText' => trans('admin/buildings/general.about_buildings_text'),
    'formAction' => ($item) ? route('buildings.update', ['buildings' => $item->id]) : route('buildings.store'),
])

{{-- Page content --}}
@section('inputFields')

@include ('partials.forms.edit.company-select', ['translated_name' => trans('general.company'), 'fieldname' => 'company_id'])
@include ('partials.forms.edit.buildings.name', ['translated_name' => trans('admin/buildings/general.buildings_name')])
@include ('partials.forms.edit.category-select', ['translated_name' => trans('general.category'), 'fieldname' => 'category_id', 'required' => 'true','category_type' => 'buildings'])

@include ('partials.forms.edit.buildings.stock_holder_code', ['translated_name' => trans('admin/buildings/general.stock_holder_code')])
@include ('partials.forms.edit.buildings.description', ['translated_name' => trans('admin/buildings/form.description')])
@include ('partials.forms.edit.buildings.revenue_village', ['translated_name' => trans('admin/buildings/form.revenue_village')])
@include ('partials.forms.edit.buildings.dimension', ['translated_name' => trans('admin/buildings/form.dimension')])
@include ('partials.forms.edit.buildings.no_of_floor', ['translated_name' => trans('admin/buildings/form.no_of_floor')])
@include ('partials.forms.edit.buildings.year_of_acquisition', ['translated_name' => trans('admin/buildings/form.year_of_acquisition')])
@include ('partials.forms.edit.buildings.improvement', ['translated_name' => trans('admin/buildings/form.improvement')])
@include ('partials.forms.edit.buildings.total_cost', ['translated_name' => trans('admin/buildings/form.total_cost')])
@include ('partials.forms.edit.purchase_date')
@include ('partials.forms.edit.buildings.life_of_assets', ['translated_name' => trans('admin/buildings/form.life_of_assets')])
@include ('partials.forms.edit.buildings.no_of_years_assets_use', ['translated_name' => trans('admin/buildings/form.no_of_years_assets_use')])
@include ('partials.forms.edit.buildings.remaining_life', ['translated_name' => trans('admin/buildings/form.remaining_life')])
@include ('partials.forms.edit.buildings.rate_of_depreciation', ['translated_name' => trans('admin/buildings/form.rate_of_depreciation')])
@include ('partials.forms.edit.buildings.currunt_use_of_building', ['translated_name' => trans('admin/buildings/form.currunt_use_of_building')])
@include ('partials.forms.edit.buildings.remarks', ['translated_name' => trans('admin/buildings/form.remarks')])


<!-- Image -->

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label class="col-md-3 control-label" for="image">{{ trans('general.image_upload') }}</label>
    <div class="col-md-5">
        <label class="btn btn-default">
            {{ trans('button.select_file')  }}
            <input type="file" name="image" accept="image/gif,image/jpeg,image/png,image/svg" hidden>
        </label>
        <p class="help-block">Accepted filetypes are jpg, png, gif and svg</p>
        {!! $errors->first('image', '<span class="alert-msg">:message</span>') !!}
    </div>
</div>



@stop
