<?php

namespace App\Http\Requests;

use App\Models\CreateChemical;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCreateChemicalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('create_chemical_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:create_chemicals,id',
        ];
    }
}
