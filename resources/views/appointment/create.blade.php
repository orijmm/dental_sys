@extends('layouts.app')

@section('page-title', 'CITAS Medicas')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> CITAS
            <small>Médicas</small></h2>
      </div>
      <div class="panel-body">
        @if($edit)
        {!! Form::model($appointment, ['route' => ['appointment.update', $appointment->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @else
         {!! Form::open(['route' => 'appointment.store', 'class' => 'form-horizontal']) !!}
        @endif
        <div class="form-group">
          <label class="col-md-2 control-label" for="num_consult_id">Número de consultorio</label>
          <div class="col-sm-10">
          {!!Form::select('num_consult_id', $numconsult,null, ['class' => 'form-control'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="patient_id">Paciente</label>
          <div class="col-sm-10">
          {!!Form::select('patient_id', $patients,null, ['class' => 'form-control'])!!} 
          <a  href="{{route('patient.create')}}" class="text-info"><i class="fa fa-plus-circle fa-2x"></i><small> Agregar paciente</small></a>
          </div>
        </div>
        <div  class="form-group">
          <label class="col-md-2 control-label" for="specialist_id">Especilista </label>
          <div class="col-sm-10">
          {!!Form::select('specialist_id',$specialists,null, ['class' => 'form-control'])!!}
          <a  href="{{route('specialist.create')}}" class="text-info"><i class="fa fa-plus-circle fa-2x"></i><small> Agregar especialista</small></a>
           </div>
        </div>
        <div  class="form-group">
          <label class="col-md-2 control-label" for="elije">Condición </label>
          <div class="col-sm-10">
          {!!Form::select('elije', ['1' => 'Emergencia', '2' => 'Control', '3' => 'Primera Cita'],null, ['class' => 'form-control'])!!}
           </div>
        </div>
        <div  class="form-group">
          <label class="col-md-2 control-label" for="status">Status </label>
          <div class="col-sm-10">
          {!!Form::select('status', ['1' => 'Activo', '2' => 'Inactivo'],null, ['class' => 'form-control'])!!}
           </div>
        </div>
        <div class="form-group">
        <label class="col-md-2 control-label" for="datetime">Fecha y hora </label>
          <div class='col-md-5 input-group date' id='datetime'>
              <input type='text' name="datetime" class="form-control" />
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{route('appointment.index')}}" class="btn btn-info  pull-right"><i class="fa fa-list"></i> Listado de citas</a>
      </div>
      {!! Form::close() !!}
    </div>
</div>
@endsection
@section('scripts')

 <!-- jquery.inputmask -->
 {!! HTML::script('public/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') !!}
 <!-- moment -->
 {!! HTML::script('public/assets/js/moment/moment.min.js') !!}
 <!-- bootstrap-daterangepicker -->
 {!! HTML::script('public/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') !!}

 <script>
  $(document).ready(function() {

      $('#datetime').datetimepicker({
        format: 'DD-MM-YYYY h:mm a'
      });
   
  });
</script>
 
@endsection
