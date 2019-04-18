<?php

namespace App\Http\Requests;

use App\Sector;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroySectorRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('sector_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sectors,id',
        ];
    }
}
