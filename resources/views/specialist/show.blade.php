@extends('layouts.app')

@section('page-title', 'Especialistas')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Especialista
            <small>{{$specialist->full_name}}</small></h2>
      </div>
      <div class="panel-body">
        <ul class="list-unstyled">
          <li><strong>Especialidad: </strong>{{$specialist->specialties->name}}</li>
          <li><strong>Nombre y apellido: </strong>{{$specialist->full_name}}</li>
          <li><strong>Cedula: </strong>{{$specialist->dni}}</li>
          <li><strong>Email: </strong>{{$specialist->email}}</li>
          <li><strong>Teléfono: </strong>{{$specialist->phone}}</li>
          <li><strong>Estatus:</strong> @if($specialist->status == 1 ) <button class="btn btn-success">Activo</button>@else <button class="btn btn-default">Inactivo</button>@endif
          </li>
        </ul>     
      </div>
      <div class="panel-footer">
        <a href="{{route('specialist.index')}}" class="btn btn-success">Listado de Especialistas</a>
      </div>
    </div>
</div>

@endsection