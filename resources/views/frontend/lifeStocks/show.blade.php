@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.lifeStock.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.life-stocks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lifeStock.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $lifeStock->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lifeStock.fields.breed') }}
                                    </th>
                                    <td>
                                        {{ App\Models\LifeStock::BREED_SELECT[$lifeStock->breed] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lifeStock.fields.purpose') }}
                                    </th>
                                    <td>
                                        {{ App\Models\LifeStock::PURPOSE_SELECT[$lifeStock->purpose] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lifeStock.fields.date_of_birth') }}
                                    </th>
                                    <td>
                                        {{ $lifeStock->date_of_birth }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lifeStock.fields.weight') }}
                                    </th>
                                    <td>
                                        {{ $lifeStock->weight }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lifeStock.fields.purchase_date') }}
                                    </th>
                                    <td>
                                        {{ $lifeStock->purchase_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lifeStock.fields.notes') }}
                                    </th>
                                    <td>
                                        {{ $lifeStock->notes }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lifeStock.fields.health_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\LifeStock::HEALTH_STATUS_SELECT[$lifeStock->health_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lifeStock.fields.number_of_birds') }}
                                    </th>
                                    <td>
                                        {{ $lifeStock->number_of_birds }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.life-stocks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection