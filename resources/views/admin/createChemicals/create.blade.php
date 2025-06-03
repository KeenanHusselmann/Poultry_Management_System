@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.createChemical.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.create-chemicals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.createChemical.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.createChemical.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.createChemical.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.createChemical.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purchase_date">{{ trans('cruds.createChemical.fields.purchase_date') }}</label>
                <input class="form-control date {{ $errors->has('purchase_date') ? 'is-invalid' : '' }}" type="text" name="purchase_date" id="purchase_date" value="{{ old('purchase_date') }}">
                @if($errors->has('purchase_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.createChemical.fields.purchase_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.createChemical.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="0.01">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.createChemical.fields.quantity_helper') }}</span>
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