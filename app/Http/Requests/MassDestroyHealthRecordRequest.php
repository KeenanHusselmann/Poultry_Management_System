<?php

namespace App\Http\Requests;

use App\Models\HealthRecord;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHealthRecordRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('health_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:health_records,id',
        ];
    }
}
