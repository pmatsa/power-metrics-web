<?php

namespace App\Http\Controllers\Admin;

use App\Device;
use App\DeviceType;
use App\Sector;
use App\User;

class HomeController
{
    public function index()
    {
        $sectors = Sector::count();
        $devices = Device::count();
        $device_types = DeviceType::count();
        $users = User::count();

        return view('home', compact('sectors', 'devices', 'device_types', 'users'));
    }
}
