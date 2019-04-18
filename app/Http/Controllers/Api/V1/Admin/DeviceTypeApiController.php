<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\DeviceType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeviceTypeRequest;
use App\Http\Requests\UpdateDeviceTypeRequest;

class DeviceTypeApiController extends Controller
{
    public function index()
    {
        $deviceTypes = DeviceType::all();

        return $deviceTypes;
    }

    public function store(StoreDeviceTypeRequest $request)
    {
        return DeviceType::create($request->all());
    }

    public function update(UpdateDeviceTypeRequest $request, DeviceType $deviceType)
    {
        return $deviceType->update($request->all());
    }

    public function show(DeviceType $deviceType)
    {
        return $deviceType;
    }

    public function destroy(DeviceType $deviceType)
    {
        return $deviceType->delete();
    }
}
