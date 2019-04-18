@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.sector.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.sector.fields.name') }}
                    </th>
                    <td>
                        {{ $sector->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection