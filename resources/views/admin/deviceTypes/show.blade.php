@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.deviceType.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.deviceType.fields.name') }}
                    </th>
                    <td>
                        {{ $deviceType->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection