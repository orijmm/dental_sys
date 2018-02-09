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
             CONSULTORIO: 1<br>ESPECIALISTA: Camila Palacios<br>PACIENTE: Mayela Baez<br>CONDICIÓN: (Control)
            <br><i class="fa fa-clock-o"></i> 8:00 AM<br><i class="fa fa-calendar"></i> 12/04/2018
            </div>
          </div>
        </div>     
      </div>
      <div class="panel-footer">
      <button class="btn btn-warning"><i class="fa fa-pencil"></i> Editar Cita</button>
      <button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar Cita</button>
        <a href="{{route('appointment.index')}}" class="btn btn-success">Listado de citas</a>
      </div>
    </div>
</div>

@endsection