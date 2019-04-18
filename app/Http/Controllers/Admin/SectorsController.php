<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySectorRequest;
use App\Http\Requests\StoreSectorRequest;
use App\Http\Requests\UpdateSectorRequest;
use App\Sector;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SectorsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Sector::query();

            $table = Datatables::of($query->get());

            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sector_show';
                $editGate      = 'sector_edit';
                $deleteGate    = 'sector_delete';
                $crudRoutePart = 'sectors';

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

        return view('admin.sectors.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('sector_create'), 403);

        return view('admin.sectors.create');
    }

    public function store(StoreSectorRequest $request)
    {
        abort_unless(\Gate::allows('sector_create'), 403);

        $sector = Sector::create($request->all());

        return redirect()->route('admin.sectors.index');
    }

    public function edit(Sector $sector)
    {
        abort_unless(\Gate::allows('sector_edit'), 403);

        $sector->load('team');

        return view('admin.sectors.edit', compact('sector'));
    }

    public function update(UpdateSectorRequest $request, Sector $sector)
    {
        abort_unless(\Gate::allows('sector_edit'), 403);

        $sector->update($request->all());

        return redirect()->route('admin.sectors.index');
    }

    public function show(Sector $sector)
    {
        abort_unless(\Gate::allows('sector_show'), 403);

        $sector->load('team');

        return view('admin.sectors.show', compact('sector'));
    }

    public function destroy(Sector $sector)
    {
        abort_unless(\Gate::allows('sector_delete'), 403);

        $sector->delete();

        return back();
    }

    public function massDestroy(MassDestroySectorRequest $request)
    {
        Sector::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
