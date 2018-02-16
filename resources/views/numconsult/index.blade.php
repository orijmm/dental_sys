@extends('layouts.app')

@section('page-title', 'Número de consultorio')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Numero de consultorio
            <small>Médicas</small></h2>
      </div>
      <div class="panel-body">
        <div id="content-table">
         @include('numconsult.list')
        </div>
      </div>
      <div class="panel-footer">
        <a  href="{{route('numconsult.create')}}" class="btn btn-success">Nuevo número de consultorio</a>
        <a  href="{{route('appointment.index')}}" class="btn btn-info"><i class="fa fa-list"></i>   Listado de citas</a>
      </div>
    </div>
</div>

@endsection