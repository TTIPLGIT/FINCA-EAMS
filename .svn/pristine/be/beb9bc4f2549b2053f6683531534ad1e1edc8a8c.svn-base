@extends('layouts/default')

{{-- Page title --}}
@section('title')

    
    {{ trans('general.buildings') }}
    @parent
@stop

@section('header_right')
    <a href="{{ route('buildings.edit', ['buildings' => $buildings->id]) }}" class="btn btn-sm btn-primary pull-right">{{ trans('admin/buildings/table.update') }} </a>
@stop

{{-- Page content --}}
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table table-responsive">

                                <table
                                        data-columns="{{ \App\Presenters\BuildingsPresenter::dataTableLayout() }}"
                                        data-cookie-id-table="buildingsTable"
                                        data-pagination="true"
                                        data-id-table="buildingsTable"
                                        data-search="true"
                                        data-show-footer="true"
                                        data-side-pagination="server"
                                        data-show-columns="true"
                                        data-show-export="true"
                                        data-show-refresh="true"
                                        data-sort-order="asc"
                                        id="buildingsTable"
                                        class="table table-striped snipe-table"
                                        data-url="{{ route('api.buildings.index',['buildings_id'=> $buildings->id]) }}"
                                        data-export-options='{
                              "fileName": "export-buildings-{{ str_slug($buildings->name) }}-{{ date('Y-m-d') }}",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('moar_scripts')
    @include ('partials.bootstrap-table',
    ['exportFile' => 'buildings-users-export',
    'search' => true,
    'columns' => \App\Presenters\BuildingsPresenter::dataTableLayout()
])

@stop
