@extends('layouts.app')

@section('page-title', 'Pacientes')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Paciente
            <small>Nuevo paciente</small></h2>
      </div>
      <div class="panel-body">
         @if($edit)
        {!! Form::model($patient, ['route' => ['patient.update', $patient->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @else
         {!! Form::open(['route' => 'patient.store', 'class' => 'form-horizontal']) !!}
        @endif
        <div class="form-group">
          <label class="col-md-2 control-label" for="full_name">Nombre completo</label>
          <div class="col-sm-10">
          {!!Form::text('full_name',null, ['class' => 'form-control'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="dni">Cedula</label>
          <div class="col-sm-10">
          {!!Form::text('dni',null, ['class' => 'form-control'])!!} 
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="phone">Teléfono</label>
          <div class="col-sm-10">
          {!!Form::text('phone',null, ['class' => 'form-control'])!!}
          </div>
        </div>
        <div class="form-group">
        <label class="col-md-2 control-label" for="birthday">Fecha de Nacimiento </label>
          <div class='col-md-5 input-group date' id='birthday'>
              <input type='text' name="birthday" class="form-control" />
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{route('patient.index')}}" class="btn btn-info pull-right"><i class="fa fa-list"></i> Listado de pacientes</a> 
        <a href="{{route('appointment.create')}}" class="btn btn-warning pull-right"><i class="fa fa-plus-circle"></i> Crear cita</a>
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

      $('#birthday').datetimepicker({
        format: 'DD-MM-YYYY'
      });
   
  });
</script>
 
@endsection