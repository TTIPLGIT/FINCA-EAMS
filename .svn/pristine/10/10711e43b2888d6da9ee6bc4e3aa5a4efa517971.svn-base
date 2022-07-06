@extends('layouts/default')

{{-- Page title --}}
@section('title')

    
    {{ trans('general.costcentre') }}
    @parent
@stop

@section('header_right')
    <a href="{{ route('costcentres.edit', ['costcentre' => $costcentre->id]) }}" class="btn btn-sm btn-primary pull-right">{{ trans('admin/costcentres/table.update') }} </a>
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
                                        data-columns="{{ \App\Presenters\CostCentrePresenter::dataTableLayout() }}"
                                        data-cookie-id-table="costcentresTable"
                                        data-pagination="true"
                                        data-id-table="costcentresTable"
                                        data-search="true"
                                        data-show-footer="true"
                                        data-side-pagination="server"
                                        data-show-columns="true"
                                        data-show-export="true"
                                        data-show-refresh="true"
                                        data-sort-order="asc"
                                        id="costcentresTable"
                                        class="table table-striped snipe-table"
                                        data-url="{{ route('api.costcentres.index',['costcentre_id'=> $costcentre->id]) }}"
                                        data-export-options='{
                              "fileName": "export-costcentre-{{ str_slug($costcentre->costcode) }}-{{ date('Y-m-d') }}",
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
    ['exportFile' => 'costcentres-users-export',
    'search' => true,
    'columns' => \App\Presenters\CostCentrePresenter::dataTableLayout()
])

@stop
