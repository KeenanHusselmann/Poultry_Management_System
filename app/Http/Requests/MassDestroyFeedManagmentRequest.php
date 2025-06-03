<?php

namespace App\Http\Requests;

use App\Models\FeedManagment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFeedManagmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('feed_managment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:feed_managments,id',
        ];
    }
}
