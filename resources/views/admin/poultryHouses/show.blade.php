@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.poultryHouse.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.poultry-houses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.poultryHouse.fields.id') }}
                        </th>
                        <td>
                            {{ $poultryHouse->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poultryHouse.fields.poultry_house') }}
                        </th>
                        <td>
                            {{ $poultryHouse->poultry_house->farm_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poultryHouse.fields.capacity') }}
                        </th>
                        <td>
                            {{ $poultryHouse->capacity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poultryHouse.fields.number_of_birds') }}
                        </th>
                        <td>
                            {{ $poultryHouse->number_of_birds }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.poultry-houses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection