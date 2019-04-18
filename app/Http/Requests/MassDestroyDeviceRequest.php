<?php

namespace App\Http\Requests;

use App\Device;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyDeviceRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('device_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:devices,id',
        ];
    }
}
