<!-- Costcentre -->
<div class="form-group {{ $errors->has('costcentre_id') ? ' has-error' : '' }}">
    <label for="costcentre_id" class="col-md-3 control-label">{{ trans('general.costcentre') }}</label>
    <div class="col-md-7{{  (\App\Helpers\Helper::checkIfRequired($item, 'costcentre_id')) ? ' required' : '' }}">    
        {{ Form::select('costcentre_id', $costcentre_list , Input::old('costcentre_id', $item->costcentre_id), array('class'=>'select2', 'style'=>'width:350px')) }}
        {!! $errors->first('costcentre_id', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>	
    <div class="col-md-1 col-sm-1 text-left">
             <a href='{{ route('modal.costcentres') }}' data-toggle="modal"  data-target="#createModal" data-dependency="costcentres" data-select='costcentres_id' class="btn btn-sm btn-default">New</a>
    </div>
</div>