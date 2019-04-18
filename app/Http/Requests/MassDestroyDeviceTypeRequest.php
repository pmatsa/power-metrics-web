<?php

namespace App\Http\Requests;

use App\DeviceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyDeviceTypeRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('device_type_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:device_types,id',
        ];
    }
}
