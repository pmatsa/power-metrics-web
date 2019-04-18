@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.team.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.team.fields.name') }}
                    </th>
                    <td>
                        {{ $team->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection