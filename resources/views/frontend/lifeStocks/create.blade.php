@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.lifeStock.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.life-stocks.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.lifeStock.fields.breed') }}</label>
                            <select class="form-control" name="breed" id="breed" required>
                                <option value disabled {{ old('breed', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\LifeStock::BREED_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('breed', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('breed'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('breed') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.lifeStock.fields.breed_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.lifeStock.fields.purpose') }}</label>
                            <select class="form-control" name="purpose" id="purpose" required>
                                <option value disabled {{ old('purpose', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\LifeStock::PURPOSE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('purpose', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('purpose'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('purpose') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.lifeStock.fields.purpose_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">{{ trans('cruds.lifeStock.fields.date_of_birth') }}</label>
                            <input class="form-control date" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}">
                            @if($errors->has('date_of_birth'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_birth') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.lifeStock.fields.date_of_birth_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="weight">{{ trans('cruds.lifeStock.fields.weight') }}</label>
                            <input class="form-control" type="number" name="weight" id="weight" value="{{ old('weight', '0') }}" step="0.01">
                            @if($errors->has('weight'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('weight') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.lifeStock.fields.weight_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="purchase_date">{{ trans('cruds.lifeStock.fields.purchase_date') }}</label>
                            <input class="form-control date" type="text" name="purchase_date" id="purchase_date" value="{{ old('purchase_date') }}">
                            @if($errors->has('purchase_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('purchase_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.lifeStock.fields.purchase_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notes">{{ trans('cruds.lifeStock.fields.notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes">{{ old('notes') }}</textarea>
                            @if($errors->has('notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.lifeStock.fields.notes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.lifeStock.fields.health_status') }}</label>
                            <select class="form-control" name="health_status" id="health_status">
                                <option value disabled {{ old('health_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\LifeStock::HEALTH_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('health_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('health_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('health_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.lifeStock.fields.health_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="number_of_birds">{{ trans('cruds.lifeStock.fields.number_of_birds') }}</label>
                            <input class="form-control" type="number" name="number_of_birds" id="number_of_birds" value="{{ old('number_of_birds', '') }}" step="1" required>
                            @if($errors->has('number_of_birds'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('number_of_birds') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.lifeStock.fields.number_of_birds_helper') }}</span>
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