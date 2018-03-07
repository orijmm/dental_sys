@extends('layouts.app')

@section('page-title', 'Venta')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Ventas
            <small>Médicas</small></h2>
      </div>
            <div class="panel-body">
         @if($edit)
        {!! Form::model($sale, ['route' => ['sale.update', $sale->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @else
         {!! Form::open(['route' => 'sale.store', 'class' => 'form-horizontal']) !!}
        @endif
        <div class="form-group">
        <label class="col-md-2 control-label" for="datetime">Fecha del servicio</label>
          <div class='col-md-5 input-group date' id='datetime'>
          {!! Form::text('date',old('datetimepicker'),['class' => 'form-control'])!!}
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
        <div  class="form-group">
          <label class="col-md-2 control-label" for="status">Paciente </label>
          <div class="col-sm-10">
          {!!Form::select('patient_id', $patients,old('patient_id'), ['placeholder' => 'Selecione','class' => 'form-control'])!!}
           </div>
        </div>
        <div  class="form-group">
          <label class="col-md-2 control-label" for="status">Especialista </label>
          <div class="col-sm-10">
          {!!Form::select('specialist_id', $specialists,old('specialist_id'), ['placeholder' => 'Selecione','class' => 'form-control'])!!}
           </div>
        </div>
        <hr>
        <div  class="form-group">
          <label class="col-md-2 control-label" for="status">Servicios </label>
          <div class="col-sm-10">
          {!!Form::select('service_id[]', $services,null, ['placeholder' => 'Selecione','class' => 'form-control'])!!}
           </div>
        </div>
        <div id="addserv"></div>
        <div  class="form-group">
          <div class="col-md-2">
            
          </div>
          <div class="col-md-10">
            <button type="button" class="btn btn-info add_service"><i class="fa fa-plus"></i></button> Agregar otro Servicios
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{route('sale.index')}}" class="btn btn-info pull-right"><i class="fa fa-list"></i> Listado de ventas</a>
      </div>
      {!! Form::close() !!}
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

  $(document).on('click','.add_service',function(){
    var divform = $(document.createElement('div'));
    var divcol1 = $(document.createElement('div'));
    var divcol2 = $(document.createElement('div'));
    var inputselect = $(document.createElement('select'));
    var deletebutton = $(document.createElement('span'));
    var icon         = $(document.createElement('i'));


    inputselect.addClass('form-control'); 
    divform.addClass('form-group');
    divcol1.addClass('col-md-2');
    divcol2.addClass('col-md-10');
    inputselect.attr('name','service_id[]');

    $('#addserv').append(divform);
    divform.append(divcol1);
    divform.append(divcol2);
    divcol2.append(inputselect);
    deletebutton.addClass('btn btn-danger pull-right deleteserv');
    icon.addClass('fa fa-trash');
    divcol1.append(deletebutton);
    deletebutton.append(icon);
   
    $.get("{{route('datos.services')}}", function(data, status){
          for (i in data.services) {
          var inputoption = $(document.createElement('option'));
          inputoption.val(data.services[i].id);
          inputoption.text(data.services[i].name) ;
          inputselect.append(inputoption);
          

          }
    });

  });

  $(document).on('click','.deleteserv',function(){
    $(this).closest('.form-group').remove();
  });
</script>
 
@endsection
