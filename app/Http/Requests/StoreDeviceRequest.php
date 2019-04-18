<?php

namespace App\Http\Requests;

use App\Device;
use Illuminate\Foundation\Http\FormRequest;

class StoreDeviceRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('device_create');
    }

    public function rules()
    {
        return [
            'uid'            => [
                'required',
            ],
            'name'           => [
                'required',
            ],
            'sector_id'      => [
                'required',
                'integer',
            ],
            'device_type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
