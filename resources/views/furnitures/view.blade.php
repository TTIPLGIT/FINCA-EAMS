@extends('layouts/default')

{{-- Page title --}}
@section('title')

 {{ $furnitures->name }}
 {{ trans('general.furnitures') }}
 @if ($furnitures->model_number!='')
     ({{ $furnitures->model_number }})
 @endif

@parent
@stop

{{-- Right header --}}
@section('header_right')
    @can('manage', \App\Models\Furnitures::class)
        <div class="dropdown pull-right">
          <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">{{ trans('button.actions') }}
              <span class="caret"></span>
          </button>
          <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
            @if ($furnitures->assigned_to != '')
              @can('checkin', \App\Models\Furnitures::class)
              <li role="presentation">
                <a href="{{ route('checkin/furnitures', $furnitures->id) }}">{{ trans('admin/furnitures/general.checkin') }}</a>
              </li>
              @endcan
            @else
              @can('checkout', \App\Models\Furnitures::class)
              <li role="presentation">
                <a href="{{ route('checkout/furnitures', $furnitures->id)  }}">{{ trans('admin/furnitures/general.checkout') }}</a>
              </li>
              @endcan
            @endif
            @can('update', \App\Models\Furnitures::class)
            <li role="presentation">
              <a href="{{ route('furnitures.edit', $furnitures->id) }}">{{ trans('admin/furnitures/general.edit') }}</a>
            </li>
            @endcan
          </ul>
        </div>
    @endcan
@stop

{{-- Page content --}}
@section('content')


<div class="row">
  <div class="col-md-9">

    <div class="box box-default">
      <div class="box-body">
        <div class="table table-responsive">

            <table
                    data-cookie-id-table="usersTable"
                    data-pagination="true"
                    data-id-table="usersTable"
                    data-search="true"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-export="true"
                    data-show-refresh="true"
                    data-sort-order="asc"
                    id="usersTable"
                    class="table table-striped snipe-table"
                    data-url="{{ route('api.furnitures.checkedout', $furnitures->id) }}"
                    data-export-options='{
                    "fileName": "export-furnitures-{{ str_slug($furnitures->name) }}-users-{{ date('Y-m-d') }}",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                    }'>
                <thead>
                <tr>
                    <th data-searchable="false" data-formatter="usersLinkFormatter" data-sortable="false" data-field="name">{{ trans('general.user') }}</th>
                    <th data-searchable="false" data-sortable="false" data-field="actions" data-formatter="furnituresInOutFormatter">{{ trans('table.actions') }}</th>
                </tr>
                </thead>

            </table>
        </div>
      </div>
    </div>
  </div>


  <!-- side address column -->
  <div class="col-md-3">

    <h4>{{ trans('admin/furnitures/general.about_furnitures_title') }}</h4>
    <p>{{ trans('admin/furnitures/general.about_furnitures_text') }} </p>
    <div class="text-center">
      @can('checkout', \App\Models\Furnitures::class)
        <a href="{{ route('checkout/furnitures', $furnitures->id) }}" style="margin-right:5px;" class="btn btn-info btn-sm" {{ (($furnitures->numRemaining() > 0 ) ? '' : ' disabled') }}>{{ trans('general.checkout') }}</a>
      @endcan
    </div>

  </div>
</div>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop
