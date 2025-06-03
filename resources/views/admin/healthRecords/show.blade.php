@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.healthRecord.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.health-records.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.healthRecord.fields.id') }}
                        </th>
                        <td>
                            {{ $healthRecord->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.healthRecord.fields.live_stock') }}
                        </th>
                        <td>
                            {{ $healthRecord->live_stock->breed ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.healthRecord.fields.disease') }}
                        </th>
                        <td>
                            {{ $healthRecord->disease->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.healthRecord.fields.record_date') }}
                        </th>
                        <td>
                            {{ $healthRecord->record_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.healthRecord.fields.notes') }}
                        </th>
                        <td>
                            {{ $healthRecord->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.healthRecord.fields.desc_of_sick') }}
                        </th>
                        <td>
                            {{ $healthRecord->desc_of_sick }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.health-records.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection