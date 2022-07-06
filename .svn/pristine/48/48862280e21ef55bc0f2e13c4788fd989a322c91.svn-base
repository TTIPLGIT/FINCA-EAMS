<!-- Dimension -->
<div class="form-group {{ $errors->has('dimension') ? ' has-error' : '' }}">
    <label for="dimension" class="col-md-3 control-label">{{ $translated_name }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'dimension')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="dimension" id="dimension" value="{{ Input::old('dimension', $item->dimension) }}" />        
        {!! $errors->first('dimension', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('length') ? ' has-error' : '' }}">
    <label for="length" class="col-md-3 control-label">Length</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'length')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="length" id="length" value="{{ Input::old('length', $item->length) }}" />
        
        {!! $errors->first('length', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('breadth') ? ' has-error' : '' }} " >
    <label for="breadth" class="col-md-3 control-label">Breadth</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'breadth')) ? ' required' : '' }}">
        <input class="form-control" type="text" name="breadth" id="breadth" value="{{ Input::old('breadth', $item->breadth) }}" />
        
        {!! $errors->first('breadth', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>

<input type="button" name="dimension" id="dimension" size="4" onclick="calculateArea()" value="dimension">

<script type="text/javascript">
	function calculateArea(){ 
  var length = +document.getElementById("length").value;
  var breadth = +document.getElementById("breadth").value;
  var dimension = length * breath;
  document.getElementById("dimension").value = dimension;
}
</script>
