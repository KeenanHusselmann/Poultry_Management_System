@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.disease.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.diseases.update", [$disease->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.disease.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $disease->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disease.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.disease.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $disease->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disease.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="government_source">{{ trans('cruds.disease.fields.government_source') }}</label>
                <input class="form-control {{ $errors->has('government_source') ? 'is-invalid' : '' }}" type="text" name="government_source" id="government_source" value="{{ old('government_source', $disease->government_source) }}">
                @if($errors->has('government_source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('government_source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disease.fields.government_source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="other_source">{{ trans('cruds.disease.fields.other_source') }}</label>
                <input class="form-control {{ $errors->has('other_source') ? 'is-invalid' : '' }}" type="text" name="other_source" id="other_source" value="{{ old('other_source', $disease->other_source) }}">
                @if($errors->has('other_source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('other_source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disease.fields.other_source_helper') }}</span>
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