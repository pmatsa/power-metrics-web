<?php

namespace App\Http\Controllers\Admin;

use App\DeviceType;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeviceTypeRequest;
use App\Http\Requests\StoreDeviceTypeRequest;
use App\Http\Requests\UpdateDeviceTypeRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DeviceTypeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = DeviceType::query();

            $table = Datatables::of($query->get());

            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'device_type_show';
                $editGate      = 'device_type_edit';
                $deleteGate    = 'device_type_delete';
                $crudRoutePart = 'device-types';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->rawColumns(['actions']);

            return $table->make(true);
        }

        return view('admin.deviceTypes.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('device_type_create'), 403);

        return view('admin.deviceTypes.create');
    }

    public function store(StoreDeviceTypeRequest $request)
    {
        abort_unless(\Gate::allows('device_type_create'), 403);

        $deviceType = DeviceType::create($request->all());

        return redirect()->route('admin.device-types.index');
    }

    public function edit(DeviceType $deviceType)
    {
        abort_unless(\Gate::allows('device_type_edit'), 403);

        $deviceType->load('team');

        return view('admin.deviceTypes.edit', compact('deviceType'));
    }

    public function update(UpdateDeviceTypeRequest $request, DeviceType $deviceType)
    {
        abort_unless(\Gate::allows('device_type_edit'), 403);

        $deviceType->update($request->all());

        return redirect()->route('admin.device-types.index');
    }

    public function show(DeviceType $deviceType)
    {
        abort_unless(\Gate::allows('device_type_show'), 403);

        $deviceType->load('team');

        return view('admin.deviceTypes.show', compact('deviceType'));
    }

    public function destroy(DeviceType $deviceType)
    {
        abort_unless(\Gate::allows('device_type_delete'), 403);

        $deviceType->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeviceTypeRequest $request)
    {
        DeviceType::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
