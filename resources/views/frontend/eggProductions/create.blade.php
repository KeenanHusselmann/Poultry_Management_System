@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.eggProduction.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.egg-productions.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="eggs_produced">{{ trans('cruds.eggProduction.fields.eggs_produced') }}</label>
                            <input class="form-control" type="number" name="eggs_produced" id="eggs_produced" value="{{ old('eggs_produced', '') }}" step="1">
                            @if($errors->has('eggs_produced'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('eggs_produced') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.eggProduction.fields.eggs_produced_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date">{{ trans('cruds.eggProduction.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}">
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.eggProduction.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notes">{{ trans('cruds.eggProduction.fields.notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes">{{ old('notes') }}</textarea>
                            @if($errors->has('notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.eggProduction.fields.notes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="eggs_id">{{ trans('cruds.eggProduction.fields.eggs') }}</label>
                            <select class="form-control select2" name="eggs_id" id="eggs_id" required>
                                @foreach($eggs as $id => $entry)
                                    <option value="{{ $id }}" {{ old('eggs_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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

        </div>
    </div>
</div>
@endsection