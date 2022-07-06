@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('general.buildings') }}
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Buildings::class)
        <a href="{{ route('buildings.create') }}" class="btn btn-primary pull-right"> {{ trans('general.create') }}</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">

            <table
                data-columns="{{ \App\Presenters\BuildingsPresenter::dataTableLayout() }}"
                data-cookie-id-table="buildingsTable"
                data-pagination="true"
                data-id-table="buildingsTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-show-footer="true"
                data-sort-order="asc"
                id="buildingsTable"
                class="table table-striped snipe-table"
                data-url="{{route('api.buildings.index') }}"
                data-export-options='{
                    "fileName": "export-buildings-{{ date('Y-m-d') }}",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                    }'>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop
