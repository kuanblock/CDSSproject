@extends('layout.main')
@section('customcss')

@endsection
@section('pageheader')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
        Mahidol Snake Envenomation Support System #4
    </h1>

  </section>
@endsection
@section('maincontent')
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <form role="form" action="{{ url('function/observerecord') }}" method="post">
      <input type="hidden" name="treatmentid" value="{{ $patientdata->record_id }}">
    <div class="row">
      <div class="col-sm-12">
        <div class="box">

          <div class="box-header with-border">
            <h3 class="box-title "><strong>Motor weakness Check</strong></h3>
          </div>

          <div class="box-body text-center">
            <div class="col-sm-12">
              <h2><strong>Patient :</strong>  {{ $patientdata->patient_name }}</h2>
              <h2><strong>State :</strong> @if ($patientdata->state = 1)
                Observe motor weakness q 1 hr for 24 hr
              @endif</h2>
                <div class="row">
                  <hr>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1"><h3><strong>Muscle weakness</strong></h3> </label>
                      <div class="form-group">
                        <div class='radio-inline'>
                          <label>
                            <input type='radio' name='muscle_weakness' value='1' required>
                            <h1>Yes</h1>
                          </label>
                        </div>
                        <div class='radio-inline'>
                          <label>
                            <input type='radio' name='muscle_weakness' value='0'  >
                            <h1>No</h1>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <hr>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1"><h3><strong>Ptosis weakness</strong></h3></label>
                      <div class="form-group">
                        <div class='radio-inline'>
                          <label>
                            <input type='radio' name='ptosis_weakness' value='1' required>
                            <h1>Yes</h1>
                          </label>
                        </div>
                        <div class='radio-inline'>
                          <label>
                            <input type='radio' name='ptosis_weakness' value='0'  >
                            <h1>No</h1>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <hr>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1"><h3><strong>Dysarthria weakness</strong></h3></label>
                      <div class="form-group">
                        <div class='radio-inline'>
                          <label>
                            <input type='radio' name='dysarthria_weakness' value='1' required>
                            <h1>Yes</h1>
                          </label>
                        </div>
                        <div class='radio-inline'>
                          <label>
                            <input type='radio' name='dysarthria_weakness' value='0'  >
                            <h1>No</h1>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  <hr>
          </div>

            <div class="col-sm-12 text-center">
              <a href="{{ URL::previous() }}">
              <button type="button" class="btn btn-primary btn-lg">Back</button></a>
              <button type="submit" class="btn btn-success btn-lg">Next</button>
            </div>
          </div><!-- /.box-body -->




        </div><!-- /.box -->
      </div>




    </div>
      </form>

  </section><!-- /.content -->
@endsection
@section('customjs')



@endsection
