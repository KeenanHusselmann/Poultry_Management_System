@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.feedManagment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.feed-managments.update", [$feedManagment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.feedManagment.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $feedManagment->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedManagment.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.feedManagment.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $feedManagment->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedManagment.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="livestock_id">{{ trans('cruds.feedManagment.fields.livestock') }}</label>
                <select class="form-control select2 {{ $errors->has('livestock') ? 'is-invalid' : '' }}" name="livestock_id" id="livestock_id">
                    @foreach($livestocks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('livestock_id') ? old('livestock_id') : $feedManagment->livestock->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('livestock'))
                    <div class="invalid-feedback">
                        {{ $errors->first('livestock') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedManagment.fields.livestock_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="feeding_date">{{ trans('cruds.feedManagment.fields.feeding_date') }}</label>
                <input class="form-control datetime {{ $errors->has('feeding_date') ? 'is-invalid' : '' }}" type="text" name="feeding_date" id="feeding_date" value="{{ old('feeding_date', $feedManagment->feeding_date) }}" required>
                @if($errors->has('feeding_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('feeding_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedManagment.fields.feeding_date_helper') }}</span>
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