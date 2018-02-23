@extends('layouts.app')

@section('page-title', 'Historial')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Historias
            <small>Dentales</small></h2>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <select id="selectbasic" name="selectbasic" class="form-control">
            <option value="1">Cédula de identidad</option>
            <option value="2">Especialista</option>
            <option value="3">Número de historia</option>
          </select>
        </div>  
        <div class="form-group">
          <input type="text" id="term" name="term" class="form-control col-md-12"  placeholder="Ingrese término">
          {!! Form::select('term2', $specialists, null, ['id'=>'term2','placeholder' => 'Seleccione', 'class' => 'form-control hide']) !!}
        </div>
        <br>
        <button type="button" id="search"  class="btn btn-default searchhistory">Buscar</button>
        <br>
        <br>
          <div id="content-table"></div>
      </div>
      <div class="panel-footer">
        <a  href="{{route('history.create')}}" class="btn btn-info">Nuevo Historial</a>
      </div>
    </div>
</div>

@endsection
