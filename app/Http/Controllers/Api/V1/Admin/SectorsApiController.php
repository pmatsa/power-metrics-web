<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectorRequest;
use App\Http\Requests\UpdateSectorRequest;
use App\Sector;

class SectorsApiController extends Controller
{
    public function index()
    {
        $sectors = Sector::all();

        return $sectors;
    }

    public function store(StoreSectorRequest $request)
    {
        return Sector::create($request->all());
    }

    public function update(UpdateSectorRequest $request, Sector $sector)
    {
        return $sector->update($request->all());
    }

    public function show(Sector $sector)
    {
        return $sector;
    }

    public function destroy(Sector $sector)
    {
        return $sector->delete();
    }
}
