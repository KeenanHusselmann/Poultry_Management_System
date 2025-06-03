<?php

namespace App\Http\Requests;

use App\Models\Insecticide;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInsecticideRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('insecticide_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'purchase_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'quantity' => [
                'numeric',
            ],
            'manufacturer' => [
                'string',
                'required',
            ],
            'expiry_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'life_stock_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
