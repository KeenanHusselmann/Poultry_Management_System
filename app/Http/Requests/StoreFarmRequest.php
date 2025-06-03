<?php

namespace App\Http\Requests;

use App\Models\Farm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFarmRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('farm_create');
    }

    public function rules()
    {
        return [
            'farm_name' => [
                'string',
                'required',
            ],
            'farm_location' => [
                'string',
                'required',
            ],
        ];
    }
}
