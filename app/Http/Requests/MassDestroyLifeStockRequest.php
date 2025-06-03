<?php

namespace App\Http\Requests;

use App\Models\LifeStock;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLifeStockRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('life_stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:life_stocks,id',
        ];
    }
}
