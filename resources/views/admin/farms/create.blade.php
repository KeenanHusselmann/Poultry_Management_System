@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.farm.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.farms.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="farm_name">{{ trans('cruds.farm.fields.farm_name') }}</label>
                <input class="form-control {{ $errors->has('farm_name') ? 'is-invalid' : '' }}" type="text" name="farm_name" id="farm_name" value="{{ old('farm_name', '') }}" required>
                @if($errors->has('farm_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('farm_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.farm.fields.farm_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="farm_location">{{ trans('cruds.farm.fields.farm_location') }}</label>
                <input class="form-control {{ $errors->has('farm_location') ? 'is-invalid' : '' }}" type="text" name="farm_location" id="farm_location" value="{{ old('farm_location', '') }}" required>
                @if($errors->has('farm_location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('farm_location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.farm.fields.farm_location_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection