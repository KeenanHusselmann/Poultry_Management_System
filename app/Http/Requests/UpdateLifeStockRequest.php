<?php

namespace App\Http\Requests;

use App\Models\LifeStock;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLifeStockRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('life_stock_edit');
    }

    public function rules()
    {
        return [
            'breed' => [
                'required',
            ],
            'purpose' => [
                'required',
            ],
            'date_of_birth' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'weight' => [
                'numeric',
            ],
            'purchase_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'number_of_birds' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
