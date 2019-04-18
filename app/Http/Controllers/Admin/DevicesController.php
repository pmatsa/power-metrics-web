<?php

namespace App\Http\Controllers\Admin;

use App\Charts\DeviceChart;
use App\Device;
use App\DeviceType;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeviceRequest;
use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use App\Sector;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DevicesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Device::query();
            $query->with(['sector', 'device_type']);
            $table = Datatables::of($query->get());

            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'device_show';
                $editGate = 'device_edit';
                $deleteGate = 'device_delete';
                $crudRoutePart = 'devices';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            $table->editColumn('uid', function ($row) {
                return $row->uid ? $row->uid : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('sector.sector', function ($row) {
                return $row->sector_id ? $row->sector->name : '';
            });
            $table->editColumn('deviceType.device_type', function ($row) {
                return $row->device_type_id ? $row->device_type->name : '';
            });
            $table->rawColumns(['actions', 'sector', 'device_type']);

            return $table->make(true);
        }

        return view('admin.devices.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('device_create'), 403);

        $sectors = Sector::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $device_types = DeviceType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.devices.create', compact('sectors', 'device_types'));
    }

    public function store(StoreDeviceRequest $request)
    {
        abort_unless(\Gate::allows('device_create'), 403);

        $device = Device::create($request->all());

        return redirect()->route('admin.devices.index');
    }

    public function edit(Device $device)
    {
        abort_unless(\Gate::allows('device_edit'), 403);

        $sectors = Sector::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $device_types = DeviceType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $device->load('sector', 'device_type', 'team');

        return view('admin.devices.edit', compact('sectors', 'device_types', 'device'));
    }

    public function update(UpdateDeviceRequest $request, Device $device)
    {
        abort_unless(\Gate::allows('device_edit'), 403);

        $device->update($request->all());

        return redirect()->route('admin.devices.index');
    }

    public function show(Device $device, Request $request)
    {
        abort_unless(\Gate::allows('device_show'), 403);

        $device->load('sector', 'device_type', 'team');
        $uid = $device->uid;

        //if specified values for dates + chart given on request, use them.
        $endDate = $request->daterange == null ? date('Y-m-d') : substr($request->daterange, -10);
        $startDate = $request->daterange == null ? date('Y-m-d', strtotime("-1 days")) : substr($request->daterange, 0, 10);
        $charts = $request->charts == null ? array('FREQ') : $request->charts;
        $limit = 10000;

        $metricsChart = new DeviceChart($uid, $endDate, $startDate, "50000");

        foreach ($charts as $chart) {
            $metricsChart->addChartField($chart, 'line', $chart);
        }

        /*
        switch ($chart) {
        case "AE":
        $metricsChart->addChartField('AE_L1', 'line', 'Ενεργός Ενέργεια L1 (VAh)');
        $metricsChart->addChartField('AE_L2', 'line', 'Ενεργός Ενέργεια L2 (VAh)');
        $metricsChart->addChartField('AE_L3', 'line', 'Ενεργός Ενέργεια L3 (VAh)');
        break;
        case "RE":
        $metricsChart->addChartField('RE_L1', 'line', 'Άεργος Ενέργεια L1 (VAh)');
        $metricsChart->addChartField('RE_L2', 'line', 'Άεργος Ενέργεια L2 (VAh)');
        $metricsChart->addChartField('RE_L3', 'line', 'Άεργος Ενέργεια L3 (VAh)');
        break;
        case "FE":
        $metricsChart->addChartField('FE_L1', 'line', 'Φαινόμενη Ενέργεια L1 (VAh)');
        $metricsChart->addChartField('FE_L2', 'line', 'Φαινόμενη Ενέργεια L2 (VAh)');
        $metricsChart->addChartField('FE_L3', 'line', 'Φαινόμενη Ενέργεια L3 (VAh)');
        break;
        case "AP":
        $metricsChart->addChartField('AP_L1', 'line', 'Ενεργός Ισχύς L1');
        $metricsChart->addChartField('AP_L2', 'line', 'Ενεργός Ισχύς L2');
        $metricsChart->addChartField('AP_L3', 'line', 'Ενεργός Ισχύς L3');
        break;
        case "RP":
        $metricsChart->addChartField('RP_L1', 'line', 'Άεργος Ισχύς L1');
        $metricsChart->addChartField('RP_L2', 'line', 'Άεργος Ισχύς L2');
        $metricsChart->addChartField('RP_L3', 'line', 'Άεργος Ισχύς L3');
        break;
        case "FP":
        $metricsChart->addChartField('FP_L1', 'line', 'Φαινόμενη Ισχύς L1');
        $metricsChart->addChartField('FP_L2', 'line', 'Φαινόμενη Ισχύς L2');
        $metricsChart->addChartField('FP_L3', 'line', 'Φαινόμενη Ισχύς L3');
        break;
        case "AE_SUM":
        $metricsChart->addChartField('AE_SUM', 'line', 'Ενεργός Ενέργεια: Άθροισμα');
        break;
        case "RE_SUM":
        $metricsChart->addChartField('RE_SUM', 'line', 'Άεργος Ενέργεια: Άθροισμα');
        break;
        case "FE_SUM":
        $metricsChart->addChartField('FE_SUM', 'line', 'Φαινόμενη Ενέργεια: Άθροισμα');
        break;
        case "V":
        $metricsChart->addChartField('V_L1', 'line', 'Τάση Ρεύματος L1 (V)');
        $metricsChart->addChartField('V_L2', 'line', 'Τάση Ρεύματος L2 (V)');
        $metricsChart->addChartField('V_L3', 'line', 'Τάση Ρεύματος L3 (V)');
        break;
        case "I":
        $metricsChart->addChartField('I_L1', 'line', 'Ένταση Ρεύματος L1 (Α)');
        $metricsChart->addChartField('I_L2', 'line', 'Ένταση Ρεύματος L2 (Α)');
        $metricsChart->addChartField('I_L3', 'line', 'Ένταση Ρεύματος L3 (Α)');
        break;
        case "COS":
        $metricsChart->addChartField('COS_L1', 'line', 'Συνημίτονο Ρεύματος L1');
        $metricsChart->addChartField('COS_L2', 'line', 'Συνημίτονο Ρεύματος L2');
        $metricsChart->addChartField('COS_L3', 'line', 'Συνημίτονο Ρεύματος L3');
        break;
        case "FREQ":
        $metricsChart->addChartField('FREQ', 'line', 'Συχνότητα (Hz)');
        break;
        default:
        break;
        }
         */

        return view('admin.devices.show', compact('device', 'metricsChart', 'startDate', 'endDate', 'charts'));
    }

    public function destroy(Device $device)
    {
        abort_unless(\Gate::allows('device_delete'), 403);

        $device->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeviceRequest $request)
    {
        Device::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

}
