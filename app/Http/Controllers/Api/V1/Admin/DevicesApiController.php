<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Device;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;

class DevicesApiController extends Controller
{
    public function index()
    {
        $devices = Device::all();

        return $devices;
    }

    public function store(StoreDeviceRequest $request)
    {
        return Device::create($request->all());
    }

    public function update(UpdateDeviceRequest $request, Device $device)
    {
        return $device->update($request->all());
    }

    public function show(Device $device)
    {
        return $device;
    }

    public function destroy(Device $device)
    {
        return $device->delete();
    }
}
