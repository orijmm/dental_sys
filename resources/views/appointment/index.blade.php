@extends('layouts.app')

@section('page-title', 'CITAS Medicas')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> CITAS
            <small>Médicas</small></h2>
      </div>
      <div class="panel-body">
         @include('appointment.list')
      </div>
      <div class="panel-footer">
        <a  href="#" class="btn btn-primary"><i class="fa fa-calendar fa-2x"></i></a>
        <a  href="{{route('appointment.create')}}" class="btn btn-info">Nueva Cita</a>
        <a  href="{{route('numconsult.index')}}" class="btn btn-warning pull-right"><i class="fa fa-list"></i> Listado de consultorios</a>
      </div>
    </div>
</div>

@endsection