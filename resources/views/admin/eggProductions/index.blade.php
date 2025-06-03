@extends('layouts.admin')
@section('content')
@can('egg_production_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.egg-productions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.eggProduction.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.eggProduction.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-EggProduction">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.eggProduction.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.eggProduction.fields.eggs_produced') }}
                        </th>
                        <th>
                            {{ trans('cruds.eggProduction.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.eggProduction.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.eggProduction.fields.eggs') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eggProductions as $key => $eggProduction)
                        <tr data-entry-id="{{ $eggProduction->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $eggProduction->id ?? '' }}
                            </td>
                            <td>
                                {{ $eggProduction->eggs_produced ?? '' }}
                            </td>
                            <td>
                                {{ $eggProduction->date ?? '' }}
                            </td>
                            <td>
                                {{ $eggProduction->notes ?? '' }}
                            </td>
                            <td>
                                {{ $eggProduction->eggs->breed ?? '' }}
                            </td>
                            <td>
                                @can('egg_production_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.egg-productions.show', $eggProduction->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('egg_production_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.egg-productions.edit', $eggProduction->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('egg_production_delete')
                                    <form action="{{ route('admin.egg-productions.destroy', $eggProduction->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('egg_production_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.egg-productions.massDestroy') }}",
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
  let table = $('.datatable-EggProduction:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection