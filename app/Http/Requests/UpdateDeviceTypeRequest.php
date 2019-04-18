<?php

namespace App\Http\Requests;

use App\DeviceType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDeviceTypeRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('device_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
