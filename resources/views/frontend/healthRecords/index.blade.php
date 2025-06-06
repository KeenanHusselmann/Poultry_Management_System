@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('health_record_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.health-records.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.healthRecord.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.healthRecord.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-HealthRecord">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.healthRecord.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.healthRecord.fields.live_stock') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.healthRecord.fields.disease') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.healthRecord.fields.record_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.healthRecord.fields.notes') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.healthRecord.fields.desc_of_sick') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($healthRecords as $key => $healthRecord)
                                    <tr data-entry-id="{{ $healthRecord->id }}">
                                        <td>
                                            {{ $healthRecord->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $healthRecord->live_stock->breed ?? '' }}
                                        </td>
                                        <td>
                                            {{ $healthRecord->disease->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $healthRecord->record_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $healthRecord->notes ?? '' }}
                                        </td>
                                        <td>
                                            {{ $healthRecord->desc_of_sick ?? '' }}
                                        </td>
                                        <td>
                                            @can('health_record_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.health-records.show', $healthRecord->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('health_record_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.health-records.edit', $healthRecord->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('health_record_delete')
                                                <form action="{{ route('frontend.health-records.destroy', $healthRecord->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('health_record_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.health-records.massDestroy') }}",
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
  let table = $('.datatable-HealthRecord:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection