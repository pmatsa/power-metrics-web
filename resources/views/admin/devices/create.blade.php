@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.device.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.devices.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('uid') ? 'has-error' : '' }}">
                <label for="uid">{{ trans('global.device.fields.uid') }}*</label>
                <input type="text" id="uid" name="uid" class="form-control" value="{{ old('uid', isset($device) ? $device->uid : '') }}">
                @if($errors->has('uid'))
                    <p class="help-block">
                        {{ $errors->first('uid') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.device.fields.uid_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.device.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($device) ? $device->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.device.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sector_id') ? 'has-error' : '' }}">
                <label for="sector">{{ trans('global.device.fields.sector') }}*</label>
                <select name="sector_id" id="sector" class="form-control select2">
                    @foreach($sectors as $id => $sector)
                        <option value="{{ $id }}" {{ (isset($device) && $device->sector ? $device->sector->id : old('sector_id')) == $id ? 'selected' : '' }}>
                            {{ $sector }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('sector_id'))
                    <p class="help-block">
                        {{ $errors->first('sector_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('device_type_id') ? 'has-error' : '' }}">
                <label for="device_type">{{ trans('global.device.fields.device_type') }}*</label>
                <select name="device_type_id" id="device_type" class="form-control select2">
                    @foreach($device_types as $id => $device_type)
                        <option value="{{ $id }}" {{ (isset($device) && $device->device_type ? $device->device_type->id : old('device_type_id')) == $id ? 'selected' : '' }}>
                            {{ $device_type }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('device_type_id'))
                    <p class="help-block">
                        {{ $errors->first('device_type_id') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection