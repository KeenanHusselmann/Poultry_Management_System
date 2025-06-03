<?php

namespace App\Http\Requests;

use App\Models\FeedManagment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFeedManagmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('feed_managment_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'feeding_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
