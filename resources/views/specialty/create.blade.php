@extends('layouts.app')

@section('page-title', 'Especialidad')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Especialidades
            <small>Médicas</small></h2>
      </div>
            <div class="panel-body">
         @if($edit)
        {!! Form::model($patient, ['route' => ['patient.update', $patient->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @else
         {!! Form::open(['route' => 'patient.store', 'class' => 'form-horizontal']) !!}
        @endif
        <div class="form-group">
          <label class="col-md-2 control-label" for="name">Nombre Especialidad</label>
          <div class="col-sm-10">
          {!!Form::text('name',null, ['class' => 'form-control'])!!} 
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{route('specialty.index')}}" class="btn btn-info pull-right"><i class="fa fa-list"></i> Listado de especialidades</a>
      </div>
    </div>
</div>

@endsection