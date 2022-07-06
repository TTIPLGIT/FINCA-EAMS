<div id="assigned_user" class="form-group{{ $errors->has($fieldname) ? ' has-error' : '' }}">

    {{ Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label')) }}

    <div class="col-md-7{{  ((isset($required)) && ($required=='true')) ? ' required' : '' }}">
        <select class="js-data-ajax" data-endpoint="costcentres" data-placeholder="{{ trans('general.select_costcentre') }}" name="{{ $fieldname }}" style="width: 100%" id="costcentre_select">
            @if ($costcentre_id = Input::old($fieldname, (isset($item)) ? $item->{$fieldname} : ''))
                <option value="{{ $costcentre_id }}" selected="selected">
                    {{ (\App\Models\CostCentre::find($costcentre_id)) ? \App\Models\CostCentre::find($costcentre_id)->costcode : '' }}
                </option>
            @else
                <option value="">{{ trans('general.select_costcentre') }}</option>
            @endif
        </select>
    </div>

    <div class="col-md-1 col-sm-1 text-left">
        @can('create', \App\Models\CostCentre::class)
            @if ((!isset($hide_new)) || ($hide_new!='true'))
                <a href='{{ route('modal.costcentres') }}' data-toggle="modal"  data-target="#createModal" data-select='costcentre_select' class="btn btn-sm btn-default">New</a>
            @endif
        @endcan
    </div>

    {!! $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fa fa-times"></i> :message</span></div>') !!}

</div>
