<?php

namespace App\Http\Requests;

use App\Models\CreateChemical;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCreateChemicalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('create_chemical_create');
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
        ];
    }
}
