@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('create_chemical_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.create-chemicals.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.createChemical.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.createChemical.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CreateChemical">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createChemical.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createChemical.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createChemical.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createChemical.fields.purchase_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.createChemical.fields.quantity') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($createChemicals as $key => $createChemical)
                                    <tr data-entry-id="{{ $createChemical->id }}">
                                        <td>
                                            {{ $createChemical->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createChemical->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createChemical->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createChemical->purchase_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $createChemical->quantity ?? '' }}
                                        </td>
                                        <td>
                                            @can('create_chemical_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.create-chemicals.show', $createChemical->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('create_chemical_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.create-chemicals.edit', $createChemical->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('create_chemical_delete')
                                                <form action="{{ route('frontend.create-chemicals.destroy', $createChemical->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('create_chemical_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.create-chemicals.massDestroy') }}",
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
  let table = $('.datatable-CreateChemical:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection