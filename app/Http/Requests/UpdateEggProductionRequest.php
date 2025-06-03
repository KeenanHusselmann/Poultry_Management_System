<?php

namespace App\Http\Requests;

use App\Models\EggProduction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEggProductionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('egg_production_edit');
    }

    public function rules()
    {
        return [
            'eggs_produced' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'eggs_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
