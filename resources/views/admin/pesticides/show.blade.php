@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pesticide.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pesticides.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pesticide.fields.id') }}
                        </th>
                        <td>
                            {{ $pesticide->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesticide.fields.name') }}
                        </th>
                        <td>
                            {{ $pesticide->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesticide.fields.description') }}
                        </th>
                        <td>
                            {{ $pesticide->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesticide.fields.purchase_date') }}
                        </th>
                        <td>
                            {{ $pesticide->purchase_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesticide.fields.quantity') }}
                        </th>
                        <td>
                            {{ $pesticide->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesticide.fields.manufacturer') }}
                        </th>
                        <td>
                            {{ $pesticide->manufacturer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesticide.fields.usage_instructions') }}
                        </th>
                        <td>
                            {{ $pesticide->usage_instructions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesticide.fields.safety_instructions') }}
                        </th>
                        <td>
                            {{ $pesticide->safety_instructions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesticide.fields.expiry_date') }}
                        </th>
                        <td>
                            {{ $pesticide->expiry_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pesticide.fields.life_stock') }}
                        </th>
                        <td>
                            {{ $pesticide->life_stock->breed ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pesticides.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection