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
                <h3>{{ $sectors}}</h3>

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
                <h3>{{ $devices }}</h3>

                <p>καταχωρημένες συσκευές</p>
              </div>
              <div class="icon">
                <i class="fas fa-digital-tachograph"> </i>
              </div>
              <a href="{{ route('admin.devices.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> {{ $device_types }}</h3>

                <p>καταχωρημένοι τύποι συσκευών</p>
              </div>
              <div class="icon">
                <i class="fas fa-ellipsis-h"> </i>
              </div>
              <a href="{{ route('admin.device-types.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> {{ $users }}</h3>

                <p>καταχωρημένοι χρήστες</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
