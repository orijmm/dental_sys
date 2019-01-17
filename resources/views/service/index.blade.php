@extends('layouts.app')

@section('page-title', 'Servicio')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Servicios
            <small>Médicos</small></h2>
      </div>
      <div class="panel-body">
        <div id="content-table">
          @include('service.list')
        </div>
      </div>
      <div class="panel-footer">
        <a  href="{{route('service.create')}}" class="btn btn-info">Nuevo Servicios</a>
      </div>
    </div>
</div>

@endsection