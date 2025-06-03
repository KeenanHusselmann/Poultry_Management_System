@extends('layouts.admin')
@section('content')
@can('feed_managment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.feed-managments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.feedManagment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.feedManagment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-FeedManagment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.feedManagment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.feedManagment.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.feedManagment.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.feedManagment.fields.livestock') }}
                        </th>
                        <th>
                            {{ trans('cruds.feedManagment.fields.feeding_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($feedManagments as $key => $feedManagment)
                        <tr data-entry-id="{{ $feedManagment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $feedManagment->id ?? '' }}
                            </td>
                            <td>
                                {{ $feedManagment->name ?? '' }}
                            </td>
                            <td>
                                {{ $feedManagment->notes ?? '' }}
                            </td>
                            <td>
                                {{ $feedManagment->livestock->breed ?? '' }}
                            </td>
                            <td>
                                {{ $feedManagment->feeding_date ?? '' }}
                            </td>
                            <td>
                                @can('feed_managment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.feed-managments.show', $feedManagment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('feed_managment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.feed-managments.edit', $feedManagment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('feed_managment_delete')
                                    <form action="{{ route('admin.feed-managments.destroy', $feedManagment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('feed_managment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.feed-managments.massDestroy') }}",
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
  let table = $('.datatable-FeedManagment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection