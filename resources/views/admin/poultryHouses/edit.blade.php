@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.poultryHouse.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.poultry-houses.update", [$poultryHouse->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="poultry_house_id">{{ trans('cruds.poultryHouse.fields.poultry_house') }}</label>
                <select class="form-control select2 {{ $errors->has('poultry_house') ? 'is-invalid' : '' }}" name="poultry_house_id" id="poultry_house_id" required>
                    @foreach($poultry_houses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('poultry_house_id') ? old('poultry_house_id') : $poultryHouse->poultry_house->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('poultry_house'))
                    <div class="invalid-feedback">
                        {{ $errors->first('poultry_house') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poultryHouse.fields.poultry_house_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="capacity">{{ trans('cruds.poultryHouse.fields.capacity') }}</label>
                <input class="form-control {{ $errors->has('capacity') ? 'is-invalid' : '' }}" type="number" name="capacity" id="capacity" value="{{ old('capacity', $poultryHouse->capacity) }}" step="1">
                @if($errors->has('capacity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('capacity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poultryHouse.fields.capacity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number_of_birds">{{ trans('cruds.poultryHouse.fields.number_of_birds') }}</label>
                <input class="form-control {{ $errors->has('number_of_birds') ? 'is-invalid' : '' }}" type="number" name="number_of_birds" id="number_of_birds" value="{{ old('number_of_birds', $poultryHouse->number_of_birds) }}" step="1">
                @if($errors->has('number_of_birds'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_birds') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poultryHouse.fields.number_of_birds_helper') }}</span>
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