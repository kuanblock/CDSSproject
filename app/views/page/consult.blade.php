@extends('layout.main')
@section('customcss')

@endsection
@section('pageheader')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
        Mahidol Snake Envenomation Support System #3
    </h1>

  </section>
@endsection
@section('maincontent')
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="row">
      <div class="col-sm-12">
        <div class="box">
          <form role="form" action="{{ url('function/confirmconsult') }}" method="post">
            <input type="hidden" name="treatmentid" value="{{ $patientdata->record_id }}">
            <input type="hidden" name="state" value="{{ $patientdata->state }}">
            <input type="hidden" name="snaketype" value="{{ $patientdata->snake_type }}">
            <input type="hidden" name="systemic_bleeding" value="{{ $patientdata->systemic_bleeding }}">
            <input type="hidden" name="respiratory_failure" value="{{ $patientdata->respiratory_failure }}">
            <input type="hidden" name="motor_weakness" value="{{ $patientdata->motor_weakness }}">
            <input type="hidden" name="logtext" value="{{$patientdata->state_text}} {{$patientdata->snake_name}} {{$patientdata->state_vials}} , Consult PC">
          <div class="box-header with-border">
            <h3 class="box-title"><strong>Consult</strong></h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h2 class="panel-title">Patient Infomation</h2>
                  </div>
                  <div class="panel-body">
                    <div class="col-sm-12 ">

                      <h4><strong>Name :</strong> {{ $patientdata->patient_name }}</h4>
                      <h4><strong>CardID :</strong> {{ $patientdata->patient_national_id }}</h4>
                      <h4><strong>Gender :</strong> {{ ( $patientdata->patient_gender == '1' ? 'Male' : 'Female') }}</h4>
                      <h4><strong>Age :</strong> {{ $patientdata->patient_ageY }} Y , {{ $patientdata->patient_ageM }} M, {{ $patientdata->patient_ageD }} D</h4>

                      <hr>

                      <h3><strong>Incident Info</strong></h3>
                      <h4><strong>Date :</strong> {{ $patientdata->incident_date }}</h4>
                      <h4><strong>Time :</strong> {{ $patientdata->incident_time }}</h4>
                      <h4><strong>Location of Incident</strong></h4>
                      <h4><strong>District :</strong> {{ $patientdata->incident_district }}</h4>
                      <h4><strong>Province :</strong> {{ $patientdata->incident_province }}</h4>
                      <hr>
                      <h3><strong>Snake Info</strong></h3>
                      <h3><strong>Snake type :</strong><span class="text-success">
                        {{ $patientdata->snake_thai_name }} : {{ $patientdata->snake_name }}
                      </span></h3>
                      @if($patientdata->systemic_bleeding == 1)
                        <h2 class="text-danger animated infinite flash"><strong>Systemic bleeding</strong></h2>
                      @endif
                      @if($patientdata->respiratory_failure == 1)
                        <h2 class="text-danger animated infinite flash"><strong>Respiratory failure</strong></h2>
                      @endif
                    </div>
                  </div>
                  <div class="panel-footer">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="">Consult select</label>
                           <select class="form-control" name="consult">
                             <option value="Data discordance" >
                               Data discordance
                             </option>
                             <option value="Emergency case" @if ($patientdata->snake_group == 1)
                               {{$patientdata->state == 6 || $patientdata->state == 11 || $patientdata->state == 9 ? 'selected' : '' }}
                             @endif
                             @if ($patientdata->snake_group == 2)
                               {{$patientdata->state == 5 || $patientdata->state == 2 || $patientdata->state == 7 || $patientdata->state == 10 ? 'selected' : '' }}
                             @endif
                             @if ($patientdata->snake_group == 3)
                               {{$patientdata->snake_group == 3 ? 'selected' : '' }}
                             @endif>
                                Emergency case
                             </option>
                           </select>
                          <br>
                          <button type="button" name="button" class="btn btn-danger btn-lg " data-toggle="modal" data-target="#myModal">Call 1367</button>
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Call</h4>
          </div>
          <div class="modal-body">
            ปรึกษาศูนย์พิษวิทยา โทร 1367
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="panel panel-warning">
                      <div class="panel-heading">
                        <h3 class="panel-title">Infomation</h3>
                      </div>
                      @if ($patientdata->systemic_bleeding == 1)
                        @if ($patientdata->snake_group == 1 || $patientdata->snake_group == 3)
                          <div class="panel-body">
                            <h3><strong>Management for systemic bleeding from hematotoxic snake bite</strong></h3>
                            <hr>
                            <h4>1.Resuscitation</h4>
                            <h4>2.Give antivenom ไม่ต้องรอผล lab</h4>
                            <h4>3.Check CBC,PT,INR, 20min WBCT,BUN,Creatinine</h4>
                            <h4>4.G/M blood component และให้ตามความเหมาะสม โดยเริ่มหลังจากให้ antivenom</h4>
                            <h4>5.ปรึกษาศูนย์พิษวิทยา โทร 1367</h4>
                          </div>
                        @endif
                      @endif
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="panel panel-danger">
                      <div class="panel-heading">
                        <h2 class="panel-title"><strong>Notification </strong></h2>
                      </div>
                      <div class="panel-body">
                        <h2 class="text-danger"><strong>
                          @if ($patientdata->systemic_bleeding == 1)
                            {{$patientdata->state_text}} {{$patientdata->snake_name}} {{$patientdata->state_vials	}}
                          @elseif($patientdata->state==11)
                            {{$patientdata->state_text}} {{$patientdata->snake_name}} {{$patientdata->state_vials	}}
                            @else
                            {{$patientdata->state_text}} {{$patientdata->snake_name}} {{$patientdata->state_vials	}}
                          @endif
                          </strong></h2>
                      </div>
                    </div>
                  </div>
                </div>
                @if ($patientdata->snake_group == 2 and $patientdata->state == 7)
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <h2 class="panel-title"><strong>Next management </strong></h2>
                        </div>
                        <div class="panel-body">
                          <h2 class="text-info"><strong>
                            Observe motor weakness q 1 hr for 12 hr
                            </strong></h2>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-sm-12">
                    <a href="{{ url("page/symptom/$patientdata->record_id") }}"><button type="button" class="btn btn-primary btn-lg btn-flat">
                      Back to Symptom Check
                    </button></a>
                    <button type="submit" class="btn btn-success btn-lg btn-flat">
                      Save and Go to Patient Table
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.box-body -->
          </form>
        </div><!-- /.box -->
      </div>

    </div>

  </section><!-- /.content -->
@endsection
@section('customjs')

@endsection
