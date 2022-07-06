@extends('layouts/default')
{{-- Page title --}}
@section('title')
{{ trans('admin/costcentres/table.costcode') }}
@parent
@stop

@section('header_right')
<a href="{{ route('costcentres.create') }}" class="btn btn-primary pull-right">
  {{ trans('general.create') }}</a>
@stop
 
{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">
          <table
                data-columns="{{ \App\Presenters\CostCentrePresenter::dataTableLayout() }}"
                data-cookie-id-table="costcentresTable"
                data-pagination="true"
                data-id-table="costcentresTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-footer="true"
                data-show-refresh="true"
                data-sort-order="asc"
                data-sort-name="name"
                data-toolbar="#toolbar"
                id="costcentresTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.costcentres.index') }}"
                data-export-options='{
                "fileName": "export-costcentres-{{ date('Y-m-d') }}",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
        </table>
        </div>
      </div>
    </div>
  </div> <!-- /.col-md-9-->


  <!-- side address column -->
  <!-- <div class="col-md-3">
    <h4>{{ trans('admin/costcentre/general.about_asset_costcentre') }}</h4>
    <p>{{ trans('admin/costcentre/general.about_costcentre') }} </p>
  </div> -->

</div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['exportFile' => 'costcentres-export', 'search' => true])
@stop






