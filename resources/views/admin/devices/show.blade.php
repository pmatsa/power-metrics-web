@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-3">
      <div class="card">
         <div class="card-header">
            Μετρήσεις συσκευής <b>{{ $device->uid }}</b>
         </div>
         <div class="card-body">
            <form action="{{ route("admin.devices.show", [$device->id]) }}" method="PUT" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
               <label>Γράφημα για προβολή μετρήσεων: </label>
               <select name="charts[]" class="form-control select2" multiple="" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                  <option value="">Επίλεξε γράφημα: </option>
                  <option {{ in_array('COS_L1', $charts) ? " selected" : " " }} value="COS_L1"> Συνημίτονο L1</option>
                  <option {{ in_array('COS_L2', $charts) ? " selected" : " " }} value="COS_L2"> Συνημίτονο L2</option>
                  <option {{ in_array('COS_L3', $charts) ? " selected" : " " }} value="COS_L3"> Συνημίτονο L3</option>
                  <option {{ in_array('FREQ', $charts) ? " selected" : " " }} value="FREQ"> Συχνότητα Ρεύματος</option>
                  <option {{ in_array('I_L1', $charts) ? " selected" : " " }} value="I_L1"> Ένταση Ρεύματος L1</option>
                  <option {{ in_array('I_L2', $charts) ? " selected" : " " }} value="I_L2"> Ένταση Ρεύματος L2</option>
                  <option {{ in_array('I_L3', $charts) ? " selected" : " " }} value="I_L3"> Ένταση Ρεύματος L3</option>
                  <option {{ in_array('V_L1', $charts) ? " selected" : " " }} value="V_L1"> Τάση Ρεύματος L1</option>
                  <option {{ in_array('V_L2', $charts) ? " selected" : " " }} value="V_L2"> Τάση Ρεύματος L2</option>
                  <option {{ in_array('V_L3', $charts) ? " selected" : " " }} value="V_L3"> Τάση Ρεύματος L3</option>
                  <option {{ in_array('AE_L1', $charts) ? " selected" : " " }} value="AE_L1"> Ενεργός Ενέργεια L1</option>
                  <option {{ in_array('AE_L2', $charts) ? " selected" : " " }} value="AE_L2"> Ενεργός Ενέργεια L2</option>
                  <option {{ in_array('AE_L3', $charts) ? " selected" : " " }} value="AE_L3"> Ενεργός Ενέργεια L3</option>
                  <option {{ in_array('RE_L1', $charts) ? " selected" : " " }} value="RE_L1"> Άεργος Ενέργεια L1 </option>
                  <option {{ in_array('RE_L2', $charts) ? " selected" : " " }} value="RE_L2"> Άεργος Ενέργεια L2 </option>
                  <option {{ in_array('RE_L3', $charts) ? " selected" : " " }} value="RE_L3"> Άεργος Ενέργεια L3 </option>
                  <option {{ in_array('FE_L1', $charts) ? " selected" : " " }} value="FE_L1"> Φαινόμενη Ενέργεια L1</option>
                  <option {{ in_array('FE_L2', $charts) ? " selected" : " " }} value="FE_L2"> Φαινόμενη Ενέργεια L2</option>
                  <option {{ in_array('FE_L3', $charts) ? " selected" : " " }} value="FE_L3"> Φαινόμενη Ενέργεια L3</option>
                  <option {{ in_array('AP_L1', $charts) ? " selected" : " " }} value="AP_L1"> Ενεργός Ισχύς L1</option>
                  <option {{ in_array('AP_L2', $charts) ? " selected" : " " }} value="AP_L2"> Ενεργός Ισχύς L2</option>
                  <option {{ in_array('AP_L3', $charts) ? " selected" : " " }} value="AP_L3"> Ενεργός Ισχύς L3</option>
                  <option {{ in_array('RP_L1', $charts) ? " selected" : " " }} value="RP_L1"> Άεργος Ισχύς L1</option>
                  <option {{ in_array('RP_L2', $charts) ? " selected" : " " }} value="RP_L2"> Άεργος Ισχύς L2 </option>
                  <option {{ in_array('RP_L3', $charts) ? " selected" : " " }} value="RP_L3"> Άεργος Ισχύς L3 </option>
                  <option {{ in_array('FP_L1', $charts) ? " selected" : " " }} value="FP_L1"> Φαινόμενη Ισχύς L1</option>
                  <option {{ in_array('FP_L2', $charts) ? " selected" : " " }} value="FP_L2"> Φαινόμενη Ισχύς L2</option>
                  <option {{ in_array('FP_L3', $charts) ? " selected" : " " }} value="FP_L3"> Φαινόμενη Ισχύς L3</option>
                  <option {{ in_array('AE_SUM', $charts) ? " selected" : " " }} value="AE_SUM"> Ενεργός Ενέργεια: Άθροισμα</option>
                  <option {{ in_array('RE_SUM', $charts) ? " selected" : " " }} value="RE_SUM"> Άεργος Ενέργεια: Άθροισμα </option>
                  <option {{ in_array('FE_SUM', $charts) ? " selected" : " " }} value="FE_SUM"> Φαινόμενη Ενέργεια: Άθροισμα </option>
               </select>
            </div>
            <p>&nbsp;</p>
            <label>Εύρος ημερομηνίας γραφήματος: </label>
            <div class="input-group-prepend">
               <span class="input-group-text">
               <i class="fa fa-calendar"></i>
               </span>
               <input type="text" class="form-control float-right active" name="daterange">
            </div>
            <div class="p-3">
               <button type="submit" class="btn btn-primary float-right">Προβολή γραφήματος</button>
            </div>
            </form>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <div class="card">
         <div class="card-header">
            Γράφημα για <b>{{ $device->uid }}</b>
         </div>
         <div class="card-body">
            <h4 class="text-center"><b>Chart Panel</b></h4>
            <div class="table-responsive">
               {!! $metricsChart->container() !!}
            </div>
         </div>
      </div>
   </div>
</div>
<div class="card">
   <div class="card-header">
      {{ trans('global.show') }} {{ trans('global.device.title') }}
   </div>
   <div class="card-body">
      <table class="table table-bordered table-striped">
         <tbody>
            <tr>
               <th>
                  {{ trans('global.device.fields.uid') }}
               </th>
               <td>
                  {{ $device->uid }}
               </td>
            </tr>
            <tr>
               <th>
                  {{ trans('global.device.fields.name') }}
               </th>
               <td>
                  {{ $device->name }}
               </td>
            </tr>
            <tr>
               <th>
                  {{ trans('global.device.fields.sector') }}
               </th>
               <td>
                  {{ $device->sector->name ?? '' }}
               </td>
            </tr>
            <tr>
               <th>
                  {{ trans('global.device.fields.device_type') }}
               </th>
               <td>
                  {{ $device->device_type->name ?? '' }}
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
{!! $metricsChart->script() !!}
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
   $('input[name="daterange"]').daterangepicker({
      startDate: moment('{{ $startDate }}', 'YYYY-MM-DD'),
      endDate: moment('{{ $endDate }}', 'YYYY-MM-DD'),
      maxDate: moment(),
      maxSpan: {
           "days": 60
       },
      locale: {
         format: 'YYYY-MM-DD'
       },
       ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
   });
</script>
@endsection
