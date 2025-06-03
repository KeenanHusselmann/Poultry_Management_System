@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.eggProduction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.egg-productions.update", [$eggProduction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="eggs_produced">{{ trans('cruds.eggProduction.fields.eggs_produced') }}</label>
                <input class="form-control {{ $errors->has('eggs_produced') ? 'is-invalid' : '' }}" type="number" name="eggs_produced" id="eggs_produced" value="{{ old('eggs_produced', $eggProduction->eggs_produced) }}" step="1">
                @if($errors->has('eggs_produced'))
                    <div class="invalid-feedback">
                        {{ $errors->first('eggs_produced') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eggProduction.fields.eggs_produced_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.eggProduction.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $eggProduction->date) }}">
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eggProduction.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.eggProduction.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $eggProduction->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eggProduction.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="eggs_id">{{ trans('cruds.eggProduction.fields.eggs') }}</label>
                <select class="form-control select2 {{ $errors->has('eggs') ? 'is-invalid' : '' }}" name="eggs_id" id="eggs_id" required>
                    @foreach($eggs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('eggs_id') ? old('eggs_id') : $eggProduction->eggs->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('eggs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('eggs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eggProduction.fields.eggs_helper') }}</span>
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