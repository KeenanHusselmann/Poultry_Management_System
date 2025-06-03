@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.farm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.farms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.farm.fields.id') }}
                        </th>
                        <td>
                            {{ $farm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.farm.fields.farm_name') }}
                        </th>
                        <td>
                            {{ $farm->farm_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.farm.fields.farm_location') }}
                        </th>
                        <td>
                            {{ $farm->farm_location }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.farms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#poultry_house_poultry_houses" role="tab" data-toggle="tab">
                {{ trans('cruds.poultryHouse.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="poultry_house_poultry_houses">
            @includeIf('admin.farms.relationships.poultryHousePoultryHouses', ['poultryHouses' => $farm->poultryHousePoultryHouses])
        </div>
    </div>
</div>

@endsection