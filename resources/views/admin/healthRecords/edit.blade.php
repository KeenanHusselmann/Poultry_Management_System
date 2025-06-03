@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.healthRecord.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.health-records.update", [$healthRecord->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="live_stock_id">{{ trans('cruds.healthRecord.fields.live_stock') }}</label>
                <select class="form-control select2 {{ $errors->has('live_stock') ? 'is-invalid' : '' }}" name="live_stock_id" id="live_stock_id" required>
                    @foreach($live_stocks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('live_stock_id') ? old('live_stock_id') : $healthRecord->live_stock->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('live_stock'))
                    <div class="invalid-feedback">
                        {{ $errors->first('live_stock') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.healthRecord.fields.live_stock_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disease_id">{{ trans('cruds.healthRecord.fields.disease') }}</label>
                <select class="form-control select2 {{ $errors->has('disease') ? 'is-invalid' : '' }}" name="disease_id" id="disease_id">
                    @foreach($diseases as $id => $entry)
                        <option value="{{ $id }}" {{ (old('disease_id') ? old('disease_id') : $healthRecord->disease->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('disease'))
                    <div class="invalid-feedback">
                        {{ $errors->first('disease') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.healthRecord.fields.disease_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="record_date">{{ trans('cruds.healthRecord.fields.record_date') }}</label>
                <input class="form-control date {{ $errors->has('record_date') ? 'is-invalid' : '' }}" type="text" name="record_date" id="record_date" value="{{ old('record_date', $healthRecord->record_date) }}" required>
                @if($errors->has('record_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('record_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.healthRecord.fields.record_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.healthRecord.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $healthRecord->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.healthRecord.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc_of_sick">{{ trans('cruds.healthRecord.fields.desc_of_sick') }}</label>
                <textarea class="form-control {{ $errors->has('desc_of_sick') ? 'is-invalid' : '' }}" name="desc_of_sick" id="desc_of_sick">{{ old('desc_of_sick', $healthRecord->desc_of_sick) }}</textarea>
                @if($errors->has('desc_of_sick'))
                    <div class="invalid-feedback">
                        {{ $errors->first('desc_of_sick') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.healthRecord.fields.desc_of_sick_helper') }}</span>
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