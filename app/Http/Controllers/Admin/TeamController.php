<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTeamRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeamController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('team_access'), 403);

        $teams = Team::all();

        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('team_create'), 403);

        return view('admin.teams.create');
    }

    public function store(StoreTeamRequest $request)
    {
        abort_unless(\Gate::allows('team_create'), 403);

        $team = Team::create($request->all());

        return redirect()->route('admin.teams.index');
    }

    public function edit(Team $team)
    {
        abort_unless(\Gate::allows('team_edit'), 403);

        return view('admin.teams.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        abort_unless(\Gate::allows('team_edit'), 403);

        $team->update($request->all());

        return redirect()->route('admin.teams.index');
    }

    public function show(Team $team)
    {
        abort_unless(\Gate::allows('team_show'), 403);

        return view('admin.teams.show', compact('team'));
    }

    public function destroy(Team $team)
    {
        abort_unless(\Gate::allows('team_delete'), 403);

        $team->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamRequest $request)
    {
        Team::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
