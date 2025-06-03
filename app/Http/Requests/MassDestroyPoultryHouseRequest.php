<?php

namespace App\Http\Requests;

use App\Models\PoultryHouse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPoultryHouseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('poultry_house_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:poultry_houses,id',
        ];
    }
}
