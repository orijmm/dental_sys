@extends('layouts.app')

@section('page-title', 'Servicio')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Servicios
            <small>Médicas</small></h2>
      </div>
            <div class="panel-body">
         @if($edit)
        {!! Form::model($service, ['route' => ['service.update', $service->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @else
         {!! Form::open(['route' => 'service.store', 'class' => 'form-horizontal']) !!}
        @endif
        <div class="form-group">
          <label class="col-md-2 control-label" for="name">Nombre Servicio</label>
          <div class="col-sm-10">
          {!!Form::text('name',null, ['class' => 'form-control'])!!} 
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="name">Costo</label>
          <div class="col-sm-10">
          {!!Form::text('cost',null, ['class' => 'form-control'])!!} 
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
        <a href="{{route('service.index')}}" class="btn btn-info pull-right"><i class="fa fa-list"></i> Listado de especialidades</a>
      </div>
      {!! Form::close() !!}
    </div>
</div>

@endsection