<!-- Purchase Cost -->
<div class="form-group {{ $errors->has('total_cost') ? ' has-error' : '' }}">
    <label for="total_cost" class="col-md-3 control-label">{{ trans('general.purchase_cost') }}</label>
    <div class="col-md-9">
        <div class="input-group col-md-3" style="padding-left: 0px;">
            <input class="form-control" type="text" name="total_cost" id="total_cost" value="{{ Input::old('total_cost', \App\Helpers\Helper::formatCurrencyOutput($item->total_cost)) }}" />
            <span class="input-group-addon">
                @if (isset($currency_type))
                    {{ $currency_type }}
                @else
                    {{ $snipeSettings->default_currency }}
                @endif
            </span>
        </div>
        <div class="col-md-9" style="padding-left: 0px;">
            {!! $errors->first('total_cost', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
        </div>
    </div>

</div>
