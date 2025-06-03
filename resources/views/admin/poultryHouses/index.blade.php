@extends('layouts.admin')
@section('content')
@can('poultry_house_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.poultry-houses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.poultryHouse.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.poultryHouse.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PoultryHouse">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.poultryHouse.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.poultryHouse.fields.poultry_house') }}
                        </th>
                        <th>
                            {{ trans('cruds.poultryHouse.fields.capacity') }}
                        </th>
                        <th>
                            {{ trans('cruds.poultryHouse.fields.number_of_birds') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($poultryHouses as $key => $poultryHouse)
                        <tr data-entry-id="{{ $poultryHouse->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $poultryHouse->id ?? '' }}
                            </td>
                            <td>
                                {{ $poultryHouse->poultry_house->farm_name ?? '' }}
                            </td>
                            <td>
                                {{ $poultryHouse->capacity ?? '' }}
                            </td>
                            <td>
                                {{ $poultryHouse->number_of_birds ?? '' }}
                            </td>
                            <td>
                                @can('poultry_house_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.poultry-houses.show', $poultryHouse->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('poultry_house_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.poultry-houses.edit', $poultryHouse->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('poultry_house_delete')
                                    <form action="{{ route('admin.poultry-houses.destroy', $poultryHouse->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('poultry_house_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.poultry-houses.massDestroy') }}",
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
  let table = $('.datatable-PoultryHouse:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection