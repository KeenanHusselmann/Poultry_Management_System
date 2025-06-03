@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.eggProduction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.egg-productions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.eggProduction.fields.id') }}
                        </th>
                        <td>
                            {{ $eggProduction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eggProduction.fields.eggs_produced') }}
                        </th>
                        <td>
                            {{ $eggProduction->eggs_produced }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eggProduction.fields.date') }}
                        </th>
                        <td>
                            {{ $eggProduction->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eggProduction.fields.notes') }}
                        </th>
                        <td>
                            {{ $eggProduction->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eggProduction.fields.eggs') }}
                        </th>
                        <td>
                            {{ $eggProduction->eggs->breed ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.egg-productions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection