<?php

  /**
   *
   */
  class PageController extends Controller
  {

    // Create New treatment  1
    public function getCreatenew()
    {
      return View::make('page.createnew');
    }

    // Confirmation 2
    public function getConfirmation()
    {

      $user_id  =  Session::get('physician_id');
      $patient_national_id  = Session::get('patient_national_id');
      $data = array(
        'physicianData' => Physician::where('user_id','=',$user_id)->first(),
        'patientData' => Patient::where('patient_national_id','=',$patient_national_id)->first()
      );
      return View::make('page.confirmation',$data);
    }

    public function getSymptom($treatmentid,$case)
    {
      $data = array(
        'treatmentdata' => Treatment::where('record_id','=',$treatmentid)->first(),
        'case' => $case
      );
      return View::make('page.symptom',$data);
    }
    public function getSymptom2($treatmentid)
    {
      $data = array(
        'treatmentdata' => Treatment::where('record_id','=',$treatmentid)->first()
      );
      return View::make('page.symptom2',$data);
    }

    public function getSymptom3($treatmentid)
    {
      $data = array(
        'treatmentdata' => Treatment::where('record_id','=',$treatmentid)->first()
      );
      return View::make('page.symptom3',$data);
    }


    public function getConsult($treatmentid)
    {
      $treatments = Treatment::join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
      ->where('record_id','=',$treatmentid)->first();
      $snakegroup = $treatments->snake_group;
      $state = $treatments->state;

      $data = array(
        'patientdata' => Treatment::join('patient', 'treatmentRecord.patient_id', '=', 'patient.patient_id')
        ->join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
        ->join('state', 'snake.snake_group', '=', 'state.state_snakegroup')
        ->where('treatmentRecord.record_id','=',$treatmentid)
        ->where('state.state_snakegroup','=',$snakegroup)
        ->where('state.state_number','=',$state)->first(),
      );
      return View::make('page.consult',$data);
    }
    public function getManagement($treatmentid)
    {
      $treatments = Treatment::join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
      ->where('record_id','=',$treatmentid)->first();
      $snakegroup = $treatments->snake_group;
      $state = $treatments->state;

      $data = array(
        'patientdata' => Treatment::join('patient', 'treatmentRecord.patient_id', '=', 'patient.patient_id')
        ->join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
        ->join('state', 'snake.snake_group', '=', 'state.state_snakegroup')
        ->where('treatmentRecord.record_id','=',$treatmentid)
        ->where('state.state_snakegroup','=',$snakegroup)
        ->where('state.state_number','=',$state)->first(),
      );
      return View::make('page.management',$data);
    }

    public function getOverview($treatmentid)
    {
      $data = array(
        'patientdata' => Treatment::join('patient', 'treatmentRecord.patient_id', '=', 'patient.patient_id')
        ->join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
        ->where('treatmentRecord.record_id','=',$treatmentid)->first(),
        'bloodtestdata' => Bloodtest::where('record_id','=',$treatmentid)->get(),
        'observedata' => Observe::where('record_id','=',$treatmentid)->get(),
        'treatmentlog' => Treatmentlog::where('record_id','=',$treatmentid)->get()
      );
      return View::make('page.overview',$data);
    }

    public function getBloodtest($treatmentid)
    {
      $treatments = Treatment::join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
      ->where('record_id','=',$treatmentid)->first();
      $snakegroup = $treatments->snake_group;
      $state = $treatments->state;

      $data = array(
        'patientdata' => Treatment::join('patient', 'treatmentRecord.patient_id', '=', 'patient.patient_id')
        ->join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
        ->join('state', 'snake.snake_group', '=', 'state.state_snakegroup')
        ->where('treatmentRecord.record_id','=',$treatmentid)
        ->where('state.state_snakegroup','=',$snakegroup)
        ->where('state.state_number','=',$state)->first(),
      );
      return View::make('page.bloodtest',$data);
    }

    public function getObserve($treatmentid)
    {
      $data = array(
        'patientdata' => Treatment::join('patient', 'treatmentRecord.patient_id', '=', 'patient.patient_id')
        ->where('treatmentRecord.record_id','=',$treatmentid)
        ->join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')->first(),
      );
      return View::make('page.motorweaknesstest',$data);
    }

    ///   Patient Table
    public function getPatienttable()
    {
      $data = array(
        'patientdata' => Treatment::join('patient', 'treatmentRecord.patient_id', '=', 'patient.patient_id')
        ->join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
        ->orderBy('treatmentRecord.created_at','desc')
        ->select('patient.patient_national_id',
         'patient.patient_name',
         'treatmentRecord.record_id',
         'treatmentRecord.state',
         'treatmentRecord.snake_type',
         'treatmentRecord.statetime',
         'treatmentRecord.statetime2',
         'treatmentRecord.status',
         'treatmentRecord.created_at',
         'treatmentRecord.staterepeat',
         'treatmentRecord.staterepeat2',
         'snake.snake_thai_name'
         )->get(),
        'datenow' => date('Y/m/d')
      );
       return View::make('page.patienttable',$data);
    }

    public function getFlowchart($treatmentid)
    {
      $treatments = Treatment::join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
      ->where('record_id','=',$treatmentid)->first();
      $data = array(
        'patientdata' => Treatment::join('patient', 'treatmentRecord.patient_id', '=', 'patient.patient_id')
        ->join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
        ->where('treatmentRecord.record_id','=',$treatmentid)->first(),
      );
      if ($treatments->snake_group == 1) {
        return View::make('page.flowchart1-1',$data);
      }
      if ($treatments->snake_group == 2) {
        return View::make('page.flowchart2-1',$data);
      }
      if ($treatments->snake_group == 3) {
        return View::make('page.flowchart3-1',$data);
      }

    }

    public function getFlowchart2($treatmentid)
    {
      $treatments = Treatment::join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
      ->where('record_id','=',$treatmentid)->first();
      $data = array(
        'patientdata' => Treatment::join('patient', 'treatmentRecord.patient_id', '=', 'patient.patient_id')
        ->join('snake', 'treatmentRecord.snake_type', '=', 'snake.snake_id')
        ->where('treatmentRecord.record_id','=',$treatmentid)->first(),
      );
      if ($treatments->snake_group == 1) {
      return View::make('page.flowchart1-2',$data);
      }

    }

  }



 ?>
