<?php

namespace App\Http\Requests;

use App\DeviceType;
use Illuminate\Foundation\Http\FormRequest;

class StoreDeviceTypeRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('device_type_create');
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
