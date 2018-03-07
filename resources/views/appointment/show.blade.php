@extends('layouts.app')

@section('page-title', 'CITAS Medicas')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> DETALLES
            <small>DE LA CITA</small></h2>
      </div>
      <div class="panel-body">
        <div class="powerwidget blue" id="basicwidget">
          <header>
            <h2></h2>
          </header>
          <div>
            <div class="inner-spacer">
             CONSULTORIO: N° {{$appointment->numconsults->name_consult}}<br>ESPECIALISTA: {{$appointment->specialists->full_name}}<br>PACIENTE: {{$appointment->patient->full_name}}<br>CONDICIÓN: {{$appointment->elije}}
            <br><i class="fa fa-clock-o"></i> <time>{{$appointment->datetime}}</time>
            </div>
          </div>
        </div>     
      </div>
      <div class="panel-footer">
      <a href="{{route('appointment.edit', $appointment->id)}}"><button class="btn btn-warning"><i class="fa fa-pencil"></i> Editar Cita</button></a>
      @permission(('citas.borrar'))
      <a type="button" data-href="{{route('appointment.destroy',$appointment->id)}}" 
                  class="btn btn-round btn-danger btn-delete" 
                  data-confirm-text="Estas seguro de borrar?"
                  data-confirm-delete="Si"
                  title="Borrar" data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-trash-o"></i> Eliminar cita
                </a>
      @endpermission
        <a href="{{route('appointment.index')}}" class="btn btn-success">Listado de citas</a>
      </div>
    </div>
</div>

@endsection