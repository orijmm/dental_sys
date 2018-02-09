@extends('layouts.app')

@section('page-title', 'Pacientes')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Pacientes
            <small>Listado de pacientes</small></h2>
      </div>
      <div class="panel-body">
         @include('patient.list')
      </div>
      <div class="panel-footer">
        <a  href="{{route('patient.create')}}" class="btn btn-info">Nuevo paciente</a>
      </div>
    </div>
</div>

@endsection