@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.insecticide.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.insecticides.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.insecticide.fields.id') }}
                        </th>
                        <td>
                            {{ $insecticide->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insecticide.fields.name') }}
                        </th>
                        <td>
                            {{ $insecticide->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insecticide.fields.description') }}
                        </th>
                        <td>
                            {{ $insecticide->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insecticide.fields.purchase_date') }}
                        </th>
                        <td>
                            {{ $insecticide->purchase_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insecticide.fields.quantity') }}
                        </th>
                        <td>
                            {{ $insecticide->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insecticide.fields.manufacturer') }}
                        </th>
                        <td>
                            {{ $insecticide->manufacturer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insecticide.fields.usage_instructions') }}
                        </th>
                        <td>
                            {{ $insecticide->usage_instructions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insecticide.fields.safety_instructions') }}
                        </th>
                        <td>
                            {{ $insecticide->safety_instructions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insecticide.fields.expiry_date') }}
                        </th>
                        <td>
                            {{ $insecticide->expiry_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insecticide.fields.life_stock') }}
                        </th>
                        <td>
                            {{ $insecticide->life_stock->breed ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.insecticides.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection