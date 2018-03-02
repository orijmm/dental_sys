@extends('layouts.app')

@section('page-title', 'Historial')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Historial
            <small>N° {{str_pad($history->id, 4, '0', STR_PAD_LEFT)}}</small></h2>
      </div>
      <div class="panel-body">
        <ul class="list-unstyled">
          <li><strong>Datos del paciente:</strong> {{$history->patient->full_name}}</li>
          <li><strong>Cédula: </strong> {{$history->patient->dni}}</li>
          <li><strong>Edad: </strong> {!!$history->patient->getAge()!!}</li>
          <li><strong>Télefono: </strong> {{$history->patient->phone}}</li>
          <li><strong>Especialista: </strong> {{$history->specialist->full_name}}</li>
        </ul> 
        <input type="hidden" name="urlteeth" id="urlteeth" value="{{url('history/edit/teeths/')}}">
        <div class="well">
          <div class="row">
            <div class="col-md-8">
              <div id="content-table">
                <div class="row">
                  <div id="odonto_1" class="col-md-6 text-right">
                  </div>
                  <div id="odonto_2" class="col-md-6">
                  </div>
                </div>
                <div class="row">
                  <div id="odonto_3" class="col-md-6  text-right">
                  </div>
                  <div id="odonto_4" class="col-md-6">
                  </div>
                </div> 
                <div style="border-bottom: 1px solid #000; margin:20px;"></div>
                <div class="row">
                  <div id="odonto_5" class="col-md-6 text-right">
                  </div>
                  <div id="odonto_6" class="col-md-6">
                  </div>
                </div>
                <div class="row">
                  <div id="odonto_7" class="col-md-6 text-right">
                  </div>
                  <div id="odonto_8" class="col-md-6">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <h4>Simbolos/Caracteristica</h4>
              <ul class="list-unstyled">
              <li><i class="fa fa-circle text-red"></i> Caries</li>
              <li><i class="fa fa-circle text-dark-blue"></i> Recina</li>
              <li><i class="fa fa-circle"></i> Amalgama</li>
              <li><img src="{{asset('public/assets/images/sellante.jpg')}}" width="20px"> Sellante</li>
              <li><img src="{{asset('public/assets/images/sellante_in.jpg')}}" width="20px">  Sellante indicado</li>
              <li><img src="{{asset('public/assets/images/extra_in.jpg')}}" width="20px">  Extracción indicada</li>
              <li><img src="{{asset('public/assets/images/con_endo.jpg')}}" width="20px">  Con endodoncía</li>
              <li><img src="{{asset('public/assets/images/protesis.jpg')}}" width="20px">  Protesis</li>
              <li><img src="{{asset('public/assets/images/necro_pul.jpg')}}" width="20px">  Necrosís pulpar</li>
              <li><img src="{{asset('public/assets/images/protesi_in.jpg')}}" width="20px">  Protesís indicada</li>
              <li><img src="{{asset('public/assets/images/clini_au.jpg')}}" width="20px">  Clinicamente ausenta</li>
              </ul>
            </div>
          </div>
        </div>
        <blockquote>
          <p>Observaciones: {{$history->observations}}</p>
        </blockquote>     
      </div>
      <div class="panel-footer">
        <a href="{{route('history.edit',$history->id)}}" class="btn btn-warning">Editar historial</a>
        <a href="{{route('history.index')}}" class="btn btn-success">Historiales</a>
      </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
  //get all teeth parameters that have same odontogram_id
  $.get("{{route('data.teeths',$history->id)}}", function(data, status){
  var datos = [];
  var loop = 1;
  //make multiarray with different size lenght - for style purpose
  datos[0] = data.teeth.slice(0,8);
  datos[1] = data.teeth.slice(8,16);
  datos[2] = data.teeth.slice(16,21);
  datos[3] = data.teeth.slice(21,26);
  datos[4] = data.teeth.slice(26,31);
  datos[5] = data.teeth.slice(31,36);
  datos[6] = data.teeth.slice(36,44);
  datos[7] = data.teeth.slice(44,52);
  //loop throught array calling function adddiv
  for (var i = 0; i < datos.length; i++) {
    addDiv(datos[i],loop);
      loop++;
    }
  });
});  
</script>
@endsection
