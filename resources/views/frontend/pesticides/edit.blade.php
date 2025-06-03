@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.pesticide.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.pesticides.update", [$pesticide->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.pesticide.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $pesticide->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pesticide.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.pesticide.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $pesticide->description) }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pesticide.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="purchase_date">{{ trans('cruds.pesticide.fields.purchase_date') }}</label>
                            <input class="form-control date" type="text" name="purchase_date" id="purchase_date" value="{{ old('purchase_date', $pesticide->purchase_date) }}">
                            @if($errors->has('purchase_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('purchase_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pesticide.fields.purchase_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ trans('cruds.pesticide.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $pesticide->quantity) }}" step="0.01">
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pesticide.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="manufacturer">{{ trans('cruds.pesticide.fields.manufacturer') }}</label>
                            <input class="form-control" type="text" name="manufacturer" id="manufacturer" value="{{ old('manufacturer', $pesticide->manufacturer) }}" required>
                            @if($errors->has('manufacturer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('manufacturer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pesticide.fields.manufacturer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="usage_instructions">{{ trans('cruds.pesticide.fields.usage_instructions') }}</label>
                            <textarea class="form-control" name="usage_instructions" id="usage_instructions">{{ old('usage_instructions', $pesticide->usage_instructions) }}</textarea>
                            @if($errors->has('usage_instructions'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('usage_instructions') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pesticide.fields.usage_instructions_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="safety_instructions">{{ trans('cruds.pesticide.fields.safety_instructions') }}</label>
                            <textarea class="form-control" name="safety_instructions" id="safety_instructions">{{ old('safety_instructions', $pesticide->safety_instructions) }}</textarea>
                            @if($errors->has('safety_instructions'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('safety_instructions') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pesticide.fields.safety_instructions_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="expiry_date">{{ trans('cruds.pesticide.fields.expiry_date') }}</label>
                            <input class="form-control date" type="text" name="expiry_date" id="expiry_date" value="{{ old('expiry_date', $pesticide->expiry_date) }}" required>
                            @if($errors->has('expiry_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('expiry_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pesticide.fields.expiry_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="life_stock_id">{{ trans('cruds.pesticide.fields.life_stock') }}</label>
                            <select class="form-control select2" name="life_stock_id" id="life_stock_id" required>
                                @foreach($life_stocks as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('life_stock_id') ? old('life_stock_id') : $pesticide->life_stock->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('life_stock'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('life_stock') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pesticide.fields.life_stock_helper') }}</span>
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