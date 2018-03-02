@extends('layouts.app')

@section('page-title', 'CITAS Medicas')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Buscar Citas
            <small>Calendario</small></h2>
      </div>
      <div class="panel-body">
         <div class="row">
         {!! Form::open(['route' => 'appointment.search.post', 'class' => 'form-horizontal']) !!}
           <div class="col-md-4">
           <div class="form-group">
            <label class="col-md-4 control-label" for="datetime">Ingrese fecha</label>
              <div class='col-md-8 input-group date' id='datetime'>
              {!! Form::text('datetime',old('datetimepicker'),['class' => 'form-control'])!!}
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
           </div>
           <div class="col-md-8">
             
           </div>
           {!! Form::close() !!}
         </div>
      </div>
      <div class="panel-footer">
        <a  href="{{route('appointment.create')}}" class="btn btn-info">Nueva Cita</a>
        <a  href="{{route('appointment.index')}}" class="btn btn-warning pull-right"><i class="fa fa-list"></i> Regresar</a>
      </div>
    </div>
</div>

@endsection
@section('scripts')

 <!-- jquery.inputmask -->
 {!! HTML::script('public/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') !!}
 <!-- moment -->
 {!! HTML::script('public/assets/js/moment/moment.min.js') !!}
 <!-- bootstrap-daterangepicker -->
 {!! HTML::script('public/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') !!}

 <script>
  $(document).ready(function() {

      $('#datetime').datetimepicker({
        format: 'DD-MM-YYYY'
      });
   
  });
</script>
 
@endsection
