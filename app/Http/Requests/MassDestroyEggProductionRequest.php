<?php

namespace App\Http\Requests;

use App\Models\EggProduction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEggProductionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('egg_production_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:egg_productions,id',
        ];
    }
}
