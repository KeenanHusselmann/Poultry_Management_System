@extends('layouts.admin')
@section('content')
@can('pesticide_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pesticides.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pesticide.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pesticide.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Pesticide">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pesticide.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pesticide.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.pesticide.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.pesticide.fields.purchase_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.pesticide.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.pesticide.fields.manufacturer') }}
                        </th>
                        <th>
                            {{ trans('cruds.pesticide.fields.usage_instructions') }}
                        </th>
                        <th>
                            {{ trans('cruds.pesticide.fields.safety_instructions') }}
                        </th>
                        <th>
                            {{ trans('cruds.pesticide.fields.expiry_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.pesticide.fields.life_stock') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesticides as $key => $pesticide)
                        <tr data-entry-id="{{ $pesticide->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pesticide->id ?? '' }}
                            </td>
                            <td>
                                {{ $pesticide->name ?? '' }}
                            </td>
                            <td>
                                {{ $pesticide->description ?? '' }}
                            </td>
                            <td>
                                {{ $pesticide->purchase_date ?? '' }}
                            </td>
                            <td>
                                {{ $pesticide->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $pesticide->manufacturer ?? '' }}
                            </td>
                            <td>
                                {{ $pesticide->usage_instructions ?? '' }}
                            </td>
                            <td>
                                {{ $pesticide->safety_instructions ?? '' }}
                            </td>
                            <td>
                                {{ $pesticide->expiry_date ?? '' }}
                            </td>
                            <td>
                                {{ $pesticide->life_stock->breed ?? '' }}
                            </td>
                            <td>
                                @can('pesticide_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pesticides.show', $pesticide->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pesticide_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pesticides.edit', $pesticide->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pesticide_delete')
                                    <form action="{{ route('admin.pesticides.destroy', $pesticide->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pesticide_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pesticides.massDestroy') }}",
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
  let table = $('.datatable-Pesticide:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection