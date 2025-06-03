<?php

namespace App\Http\Requests;

use App\Models\Disease;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDiseaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('disease_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'government_source' => [
                'string',
                'nullable',
            ],
            'other_source' => [
                'string',
                'nullable',
            ],
        ];
    }
}
