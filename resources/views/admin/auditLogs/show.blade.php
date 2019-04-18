@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.auditLog.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.auditLog.fields.description') }}
                    </th>
                    <td>
                        {{ $auditLog->description }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.auditLog.fields.subject_id') }}
                    </th>
                    <td>
                        {{ $auditLog->subject_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.auditLog.fields.subject_type') }}
                    </th>
                    <td>
                        {{ $auditLog->subject_type }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.auditLog.fields.user_id') }}
                    </th>
                    <td>
                        {{ $auditLog->user_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.auditLog.fields.properties') }}
                    </th>
                    <td>
                        {!! $auditLog->properties !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.auditLog.fields.host') }}
                    </th>
                    <td>
                        {{ $auditLog->host }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection