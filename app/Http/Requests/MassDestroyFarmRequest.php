<?php

namespace App\Http\Requests;

use App\Models\Farm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFarmRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('farm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:farms,id',
        ];
    }
}
