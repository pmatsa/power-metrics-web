<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Team;

class TeamApiController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return $teams;
    }

    public function store(StoreTeamRequest $request)
    {
        return Team::create($request->all());
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        return $team->update($request->all());
    }

    public function show(Team $team)
    {
        return $team;
    }

    public function destroy(Team $team)
    {
        return $team->delete();
    }
}
