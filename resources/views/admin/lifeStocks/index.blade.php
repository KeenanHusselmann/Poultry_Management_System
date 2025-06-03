@extends('layouts.admin')
@section('content')
@can('life_stock_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.life-stocks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.lifeStock.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.lifeStock.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-LifeStock">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.lifeStock.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.lifeStock.fields.breed') }}
                        </th>
                        <th>
                            {{ trans('cruds.lifeStock.fields.purpose') }}
                        </th>
                        <th>
                            {{ trans('cruds.lifeStock.fields.date_of_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.lifeStock.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.lifeStock.fields.purchase_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.lifeStock.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.lifeStock.fields.health_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.lifeStock.fields.number_of_birds') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lifeStocks as $key => $lifeStock)
                        <tr data-entry-id="{{ $lifeStock->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $lifeStock->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\LifeStock::BREED_SELECT[$lifeStock->breed] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\LifeStock::PURPOSE_SELECT[$lifeStock->purpose] ?? '' }}
                            </td>
                            <td>
                                {{ $lifeStock->date_of_birth ?? '' }}
                            </td>
                            <td>
                                {{ $lifeStock->weight ?? '' }}
                            </td>
                            <td>
                                {{ $lifeStock->purchase_date ?? '' }}
                            </td>
                            <td>
                                {{ $lifeStock->notes ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\LifeStock::HEALTH_STATUS_SELECT[$lifeStock->health_status] ?? '' }}
                            </td>
                            <td>
                                {{ $lifeStock->number_of_birds ?? '' }}
                            </td>
                            <td>
                                @can('life_stock_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.life-stocks.show', $lifeStock->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('life_stock_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.life-stocks.edit', $lifeStock->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('life_stock_delete')
                                    <form action="{{ route('admin.life-stocks.destroy', $lifeStock->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('life_stock_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.life-stocks.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-LifeStock:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection