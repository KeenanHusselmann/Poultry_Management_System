@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.createChemical.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.create-chemicals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.createChemical.fields.id') }}
                        </th>
                        <td>
                            {{ $createChemical->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.createChemical.fields.name') }}
                        </th>
                        <td>
                            {{ $createChemical->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.createChemical.fields.description') }}
                        </th>
                        <td>
                            {{ $createChemical->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.createChemical.fields.purchase_date') }}
                        </th>
                        <td>
                            {{ $createChemical->purchase_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.createChemical.fields.quantity') }}
                        </th>
                        <td>
                            {{ $createChemical->quantity }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.create-chemicals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection