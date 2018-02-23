@extends('layouts.app')

@section('page-title', 'Pacientes')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Paciente
            <small>{{$patient->full_name}}</small></h2>
      </div>
      <div class="panel-body">
        <ul class="list-unstyled">
          <li><strong>Nombre y apellido: </strong>{{$patient->full_name}}</li>
          <li><strong>Cedula: </strong>{{$patient->dni}}</li>
          <li><strong>Teléfono: </strong>{{$patient->phone}}</li>
          <li><strong>Edad:</strong> {{$patient->getAge()}}
          </li>
        </ul>       
      </div>
      <div class="panel-footer">
        <a href="{{route('patient.index')}}"><button type="submit" class="btn btn-success">Listado de pacientes</button></a>
      </div>
    </div>
</div>

@endsection