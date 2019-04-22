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
        $sectors_count = Sector::count();
        $devices_count = Device::count();
        $device_types_count = DeviceType::count();
        $users_count = User::count();

        $latest_users = User::orderBy('id', 'desc')->take(5)->get();
        $latest_devices = Device::orderBy('id', 'desc')->take(5)->get();

        return view('home', compact('sectors_count', 'devices_count', 'device_types_count', 'users_count', 'latest_users', 'latest_devices'));
    }
}
