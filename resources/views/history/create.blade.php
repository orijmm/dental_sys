@extends('layouts.app')

@section('page-title', 'Historial')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> HISTORIAL
            <small>Médico </small></h2>
      </div>
      <div class="panel-body">
         @if($edit)
        {!! Form::model($history, ['route' => ['history.update', $history->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @else
         {!! Form::open(['route' => 'history.store', 'class' => 'form-horizontal']) !!}
        @endif
        <div class="form-group">
          <label class="col-md-2 control-label" for="patient_id">Paciente</label>
          <div class="col-sm-10">
          {!!Form::select('patient_id', $patients,null, ['placeholder' => 'Seleccione','class' => 'form-control'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="specialist_id">Epecialista</label>
          <div class="col-sm-10">
          {!!Form::select('specialist_id', $specialists,null, ['placeholder' => 'Seleccione','class' => 'form-control'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="observations">Observaciones</label>
          <div class="col-sm-10">
          {!! Form::text('observations', old('observations'),['class'=> 'form-control', 'planceholder' => 'Observaciones']) !!}
          </div>
        </div>
      </div>
      <div class="panel-footer">
      <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{route('history.index')}}" class="btn btn-info pull-right">Busqueda de historiales</a>
      </div>
      {!! Form::close() !!}
    </div>
</div>

@endsection