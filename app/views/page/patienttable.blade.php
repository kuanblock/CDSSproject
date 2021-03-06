@extends('layout.main')
@section('customcss')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('pageheader')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
        Mahidol Snake Envenomation Support System #6
    </h1>

  </section>
@endsection
@section('maincontent')
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h2 class="box-title "><strong>Patient Table</strong></h2>
      </div>
      <div class="box-body">
        <div class='table-responsive'>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>National id </th>
                <th >Name</th>
                <th >Snake</th>
                <th>Current State</th>
                <th>Next</th>
                <th width="10%">Status</th>
                <th width="7%">
                  Create At
                </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach($patientdata as $pdata)
               <tr>
                 <td>{{ $pdata->patient_national_id }}</td>
                 <td width="10%">{{ $pdata->patient_name }}</td>
                 <td >
                  {{$pdata->snake_thai_name}}
                 </td>
                 <td>
                   @if ($pdata->snake_type == 1 or $pdata->snake_type == 2 or $pdata->snake_type == 3)
                     @if($pdata->state == 1)
                      <strong>CBC,PT,INR, 20min WBCT,BUN,Creatinine,UA</strong>
                     @endif
                     @if($pdata->state == 2)
                      <strong>CBC,PT,INR,20 min WBCT q 6 hr for 2 times (6,12) ({{$pdata->staterepeat}}/2)</strong>
                     @endif
                     @if($pdata->state == 3)
                      <strong>D/C CBC,PT,INR, 20 min WBCT, Creatinine
                        <br>Once daily for 3 days(24-36,48-60,72-84) ({{$pdata->staterepeat}}/3)</strong>
                     @endif
                     @if($pdata->state == 4)
                      <strong>Antivenom</strong>
                     @endif
                     @if($pdata->state == 5)
                      <strong>Repeat CBC,PT,INR, 20 min WBCT q 4 hr for 3 time ({{$pdata->staterepeat}}/3)</strong>
                     @endif
                     @if($pdata->state == 6)
                      <strong>Systemic bleeding</strong>
                     @endif
                     @if($pdata->state == 7)
                      <strong>Discordance of data</strong>
                     @endif
                     @if($pdata->state == 8)
                      <strong>Chang Snake type</strong>
                     @endif
                     @if($pdata->state == 9)
                      <strong>Abnormal state</strong>
                     @endif
                     @if($pdata->state == 10)
                      <strong>Done</strong>
                     @endif
                     @if($pdata->state == 11)
                      <strong>Abnormal state</strong>
                     @endif
                   @endif
                   @if ($pdata->snake_type == 4 or $pdata->snake_type == 5 or $pdata->snake_type == 6 or $pdata->snake_type == 7)
                     @if($pdata->state == 1)
                      <strong>Observe motor weakness q 1 hr for 24 hr ({{$pdata->staterepeat}}/24)</strong>
                     @endif
                     @if($pdata->state == 4)
                      <strong>Observe motor weakness q 1 h for 12 hr ({{$pdata->staterepeat}}/12)</strong>
                     @endif
                     @if($pdata->state == 5)
                      <strong>Consult PC</strong>
                     @endif
                     @if($pdata->state == 6)
                      <strong>Done</strong>
                     @endif
                     @if($pdata->state == 8)
                      <strong>Chang Snake type</strong>
                     @endif
                     @if($pdata->state == 9)
                      <strong>Discordance of data</strong>
                     @endif
                     @if($pdata->state == 10)
                      <strong>Consult PC</strong>
                     @endif
                   @endif
                   @if ($pdata->snake_type == 8)
                     @if($pdata->state == 1)
                      <strong>Consult PC</strong>
                     @endif
                     @if($pdata->state == 4)
                      <strong>Consult PC</strong>
                     @endif
                     @if($pdata->state == 5)
                      <strong>Consult PC</strong>
                     @endif
                     @if($pdata->state == 6)
                      <strong>Consult PC</strong>
                     @endif
                     @if($pdata->state == 7)
                      <strong>CBC,PT,INR,20-min WBCT,creatinine once daily for 2 time(48,72)({{$pdata->staterepeat2}}/2)</strong>
                     @endif
                     @if($pdata->state == 8)
                      <strong>Done</strong>
                     @endif
                     @if($pdata->state == 2)
                      <strong>Observe weakness and neuro sign q 1 hr for 24 hr <br>
                         Observe bleeding and bleeding precaution ({{$pdata->staterepeat}}/25)</strong><hr>
                         <strong>CBC,PT,INR,20-min WBCT initially and then <br>
                        every 6 hr for 4 times(0,6,12,18,24) ({{$pdata->staterepeat2}}/5)<br>
                        Initial creatinine and then next 24 hr (0,24)</strong>
                     @endif
                  @endif

                 </td>
                 <td width="4%">
                   @if($pdata->statetime == 0)
                      None
                     @else
                      <div data-countdown="{{$pdata->statetime}}"></div>
                      @if ($pdata->snake_type == 8 and $pdata->state == 2)
                        <br>
                        <hr>
                      <div data-countdown="{{$pdata->statetime2}}"></div>
                      @endif
                   @endif
                 </td>
                 <td>
                   @if($pdata->status == 1)
                     <span class="label label-danger">Consult PC</span>
                   @elseif($pdata->status == 2)
                     <span class="label label-success">Repeat Bloodtest</span>
                   @elseif($pdata->status == 3)
                     <span class="label label-success">Done</span>
                   @elseif($pdata->status == 4)
                     <span class="label label-warning">Repeat Observe</span>
                   @elseif($pdata->status == 5)
                    <span class="label label-warning">Repeat Observe</span>
                   <br>
                   <br>
                   <hr>
                   <span class="label label-success">Repeat Bloodtest</span>
                 @endif
                 </td>
                 <td>
                   {{ $pdata->created_at }}
                 </td>
                 <td ><a href="{{ url("page/overview/$pdata->record_id") }}" data-toggle="tooltip" data-placement="bottom" title="Overview">
                   <button type="button" class="btn btn-sm btn-info btn-flat">
                     <i class="fa fa-file-text-o"></i>
                   </button></a>
                   <a href="{{ url("page/flowchart/$pdata->record_id") }}" data-toggle="tooltip" data-placement="bottom" title="View flowchart">
                     <button type="button" class="btn btn-sm  btn-default btn-flat">
                       <i class="fa fa-sitemap"></i>
                     </button></a>
                   @if($pdata->status == 2 )
                     <a href="{{ url("page/symptom/$pdata->record_id/1") }}" data-toggle="tooltip" data-placement="bottom" title="Repeat Bloodtest">
                       <button type="button" class="btn btn-sm btn-success btn-flat">
                        <i class="fa fa-eyedropper"></i>
                       </button></a>
                   @endif
                   @if($pdata->status == 4 )
                     <a href="{{ url("page/symptom/$pdata->record_id/2") }}" data-toggle="tooltip" data-placement="bottom" title="Repeat Observe">
                       <button type="button" class="btn btn-sm btn-warning btn-flat">
                         <i class="fa fa-stethoscope"></i>
                       </button></a>
                   @endif
                   @if($pdata->status == 5 )
                        <a href="{{ url("page/symptom/$pdata->record_id/1") }}" data-toggle="tooltip" data-placement="bottom" title="Repeat Bloodtest">
                         <button type="button" class="btn btn-sm btn-success btn-flat">
                          <i class="fa fa-eyedropper"></i>
                         </button></a>
                     <a href="{{ url("page/symptom/$pdata->record_id/2") }}" data-toggle="tooltip" data-placement="bottom" title="Repeat Observe">
                       <button type="button" class="btn btn-sm btn-warning btn-flat">
                         <i class="fa fa-stethoscope"></i>
                       </button></a>
                  @endif
                </td>
               </tr>
             @endforeach

            </tbody>
          </table>

        </div>
        <div class="row">
          <div class="col-sm-12">
            <span class="label label-info"><i class="fa fa-file-text-o"></i> : View Overview</span>
            <span class="label label-default"><i class="fa fa-sitemap"></i> : View FlowChart</span>
            <span class="label label-success"><i class="fa fa-eyedropper"></i> : Repeat Bloodtest</span>
            <span class="label label-warning"><i class="fa fa-stethoscope"></i> : Repeat Observe</span>
          </div>
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->

  </section><!-- /.content -->
@endsection
@section('customjs')



 <script src="{{ url('assets/plugins/countdown/jquery.countdown.min.js') }}"></script>
  <!-- DataTables -->
  <script src="{{ url('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <script>
    $(function () {
      $("#example2").DataTable();
      $('#example1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": true
      });
    });
  </script>

  <script type="text/javascript">
  $('[data-countdown]').each(function() {
   var $this = $(this), finalDate = $(this).data('countdown');
   $this.countdown(finalDate, function(event) {
     $this.html(event.strftime('%H:%M:%S'));
   });
 });
   </script>


@endsection
