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
         <div class="col-md-4">
           <div class="panel panel-info">
             <div class="panel-heading">Ingrese fecha</div>
             <div class="panel-body">
               <div class="form-group">
                <div class='input-group date' id='datetime'>
                  {!! Form::text('datetime',old('datetimepicker'),['class' => 'form-control', 'id' => 'search'])!!}
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
              <button class="btn btn-success search">Buscar</button>  </div>
            </div>

          </div>
          <div class="col-md-8">
           <div id="content-table"></div>
         </div>
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
