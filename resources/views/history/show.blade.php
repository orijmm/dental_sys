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
        <div class="well">
          <div class="row">
            <div class="col-md-8">
            <div class="row">
              <div class="col-md-6 text-right">
              @for($i = 0; $i < 8; $i++)
              <div class="circle_odonto_back">
              <div class="circle_odonto_outer">
                <div class="circle_odonto_inner"></div>
              </div>
              </div>
              @endfor
              </div>
              <div class="col-md-6">
              @for($i = 8; $i < 16; $i++)
              <div class="circle_odonto_back">
              <div class="circle_odonto_outer">
                <div class="circle_odonto_inner"></div>
              </div>
              </div>
              @endfor
              </div>
            </div>
            <div class="row">
              <div class="col-md-6  text-right">
              @for($i = 16; $i < 21; $i++)
              <div class="circle_odonto_back">
              <div class="circle_odonto_outer">
                <div class="circle_odonto_inner"></div>
              </div>
              </div>
              @endfor
              </div>
              <div class="col-md-6">
              @for($i = 20; $i < 25; $i++)
              <div class="circle_odonto_back">
              <div class="circle_odonto_outer">
                <div class="circle_odonto_inner"></div>
              </div>
              </div>
              @endfor
              </div>
            </div>
            <div style="border-bottom: 1px solid #000; margin:20px;"></div>
            <div class="row">
              <div class="col-md-6 text-right">
              @for($i = 25; $i < 30; $i++)
              <div class="circle_odonto_back">
              <div class="circle_odonto_outer">
                <div class="circle_odonto_inner"></div>
              </div>
              </div>
              @endfor
              </div>
              <div class="col-md-6">
              @for($i = 30; $i < 35; $i++)
              <div class="circle_odonto_back">
              <div class="circle_odonto_outer">
                <div class="circle_odonto_inner"></div>
              </div>
              </div>
              @endfor
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 text-right">
              @for($i = 35; $i < 43; $i++)
              <div class="circle_odonto_back">
              <div class="circle_odonto_outer">
                <div class="circle_odonto_inner"></div>
              </div>
              </div>
              @endfor
              </div>
              <div class="col-md-6">
              @for($i = 43; $i < 51; $i++)
              <div class="circle_odonto_back">
              <div class="circle_odonto_outer">
                <div class="circle_odonto_inner"></div>
              </div>
              </div>
              @endfor
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
        <a href="{{route('history.index')}}" class="btn btn-success">Historiales</a>
      </div>
    </div>
</div>

@endsection