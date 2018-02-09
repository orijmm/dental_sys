@extends('layouts.app')

@section('page-title', 'Historial')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> CITAS
            <small>Médicas</small></h2>
      </div>
      <div class="panel-body">
        show      
      </div>
      <div class="panel-footer">
        <a href="{{route('history.index')}}" class="btn btn-success">Listado de citas</a>
      </div>
    </div>
</div>

@endsection