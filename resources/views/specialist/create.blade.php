@extends('layouts.app')

@section('page-title', 'Especialistas')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Especialistas
            <small>Médicos</small></h2>
      </div>
      <div class="panel-body">
         @if($edit)
        {!! Form::model($specialist, ['route' => ['specialist.update', $specialist->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @else
         {!! Form::open(['route' => 'specialist.store', 'class' => 'form-horizontal']) !!}
        @endif
        <div class="form-group">
          <label class="col-md-2 control-label" for="specialty_id">Especialidad</label>
          <div class="col-sm-10">
          {!!Form::select('specialty_id', $specialties,old('specialty_id'), ['placeholder' => 'Selecione', 'class' => 'form-control'])!!}<a  href="{{route('specialty.create')}}" class="text-info"><i class="fa fa-plus-circle fa-2x"></i><small> Agregar especialidad</small></a>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="name">Nombre</label>
          <div class="col-sm-10">
          {!!Form::text('name',old('name'), ['class' => 'form-control'])!!} 
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="last_name">Apellido</label>
          <div class="col-sm-10">
          {!!Form::text('last_name',old('last_name'), ['class' => 'form-control'])!!} 
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="dni">Cédula</label>
          <div class="col-sm-10">
          {!!Form::text('dni',old('dni'), ['class' => 'form-control'])!!} 
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="email">Email</label>
          <div class="col-sm-10">
          {!!Form::text('email',old('email'), ['class' => 'form-control'])!!} 
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="phone">Teléfono</label>
          <div class="col-sm-10">
          {!!Form::text('phone',old('phone'), ['class' => 'form-control'])!!} 
          </div>
        </div>
        <div  class="form-group">
          <label class="col-md-2 control-label" for="status">Status </label>
          <div class="col-sm-10">
          {!!Form::select('status', ['0' => 'Inactivo', '1' => 'Activo'],old('status'), ['placeholder' => 'Selecione','class' => 'form-control'])!!}
           </div>
        </div>
      </div>
      <div class="panel-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{route('specialist.index')}}" class="btn btn-info pull-right"><i class="fa fa-list"></i> Listado de especialistas</a>
        <a href="{{route('appointment.create')}}" class="btn btn-warning pull-right"><i class="fa fa-plus-circle"></i> Crear cita</a>
      </div>
      {!! Form::close() !!}
    </div>
</div>

@endsection