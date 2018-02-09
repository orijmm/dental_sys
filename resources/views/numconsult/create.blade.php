@extends('layouts.app')

@section('page-title', 'Número de consultorio')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Número de consultorio
            <small>Médicas</small></h2>
      </div>
      <div class="panel-body">
        @if($edit)
        {!! Form::model($numconsult, ['route' => ['numconsult.update', $numconsult->id], 'method' => 'PUT']) !!}
        @else
         {!! Form::open(['route' => 'numconsult.store', 'class' => 'col-md-6']) !!}
        @endif
        <div class="form-group">
          <label for="name_consult">Número de consultorio</label>
          <input type="number" class="form-control" placeholder="Número de consultorio">
        </div>
      </div>
      <div class="panel-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{route('numconsult.index')}}" class="btn btn-primary pull-right"><i class="fa fa-list"></i> Listado de consultorios</a>
      </div>
      {!! Form::close() !!}
    </div>
</div>

@endsection