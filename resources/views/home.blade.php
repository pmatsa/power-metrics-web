@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="callout callout-info">
              <i class="fa fa-info"></i> &nbsp;
              @lang('global.site_title') | Πλατφόρμα διαχείρισης συσκευών τηλεμετρίας
            </div>
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $sectors_count }}</h3>

                <p> καταχωρημένοι τομείς </p>
              </div>
              <div class="icon">
                <i class="fa fa-file"></i>
              </div>
              <a href="{{ route('admin.sectors.index') }}" class="small-box-footer">περισσότερα <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $devices_count }}</h3>

                <p>καταχωρημένες συσκευές</p>
              </div>
              <div class="icon">
                <i class="fas fa-digital-tachograph"> </i>
              </div>
              <a href="{{ route('admin.devices.index') }}" class="small-box-footer">περισσότερα <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> {{ $device_types_count }}</h3>

                <p>καταχωρημένοι τύποι συσκευών</p>
              </div>
              <div class="icon">
                <i class="fas fa-ellipsis-h"> </i>
              </div>
              <a href="{{ route('admin.device-types.index') }}" class="small-box-footer">περισσότερα <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> {{ $users_count }}</h3>

                <p>καταχωρημένοι χρήστες</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{ route('admin.users.index') }}" class="small-box-footer">περισσότερα <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

        </div>


        <div class="row">
          <div class="col-lg-6 col-6">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Τελευταίες 5 συσκευές</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <tbody><tr>
                    <th>{{ trans('global.device.fields.uid') }}</th>
                    <th>{{ trans('global.device.fields.name') }}</th>
                    <th>{{ trans('global.device.fields.sector') }}</th>
                    <th>{{ trans('global.device.fields.device_type') }}</th>
                    <th>{{ trans('global.device.fields.created_at') }}</th>
                  </tr>
                  @foreach($latest_devices as $device)
                    <tr>
                      <td>{{ $device->uid}}</td>
                      <td>{{ $device->name}}</td>
                      <td>{{ $device->sector->name}}</td>
                      <td><span class="badge bg-warning">{{ $device->device_type->name }}</span></td>
                      <td><span class="badge bg-primary">{{ $device->created_at}}</span></td>
                    </tr>
                  @endforeach
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-lg-6 col-6">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Τελευταίοι 5 χρήστες</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <tbody><tr>
                    <th>{{ trans('global.user.fields.name') }}</th>
                    <th>{{ trans('global.user.fields.email') }}</th>
                    <th>{{ trans('global.user.fields.created_at') }}</th>
                  </tr>
                  @foreach($latest_users as $user)
                    <tr>
                      <td><b>{{ $user->name}} </b></td>
                      <td>{{ $user->email}}</td>
                      <td><span class="badge bg-primary">{{ $user->created_at}}</span></td>
                    </tr>
                  @endforeach
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
