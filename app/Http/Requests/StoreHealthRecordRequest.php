<?php

namespace App\Http\Requests;

use App\Models\HealthRecord;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHealthRecordRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('health_record_create');
    }

    public function rules()
    {
        return [
            'live_stock_id' => [
                'required',
                'integer',
            ],
            'record_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
