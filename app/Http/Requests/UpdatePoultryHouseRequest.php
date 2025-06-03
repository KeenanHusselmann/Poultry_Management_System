<?php

namespace App\Http\Requests;

use App\Models\PoultryHouse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePoultryHouseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('poultry_house_edit');
    }

    public function rules()
    {
        return [
            'poultry_house_id' => [
                'required',
                'integer',
            ],
            'capacity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'number_of_birds' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
