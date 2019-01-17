@extends('layouts.app')

@section('page-title', 'Reportes')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
<img src="{{asset('public/images/banner1.png')}}" class="img-responsive">
    <div class="panel">
      <div class="panel-heading">
      <h2 class="text-center"> Reporte
            <small>Ventas</small></h2>
      </div>
      <div class="panel-body">
        <div class="row">
          <div  class="col-sm-6">
            <div class="powerwidget powerwidget-as-portlet powerwidget-as-portlet-green">
              <header> </header>
              <div class="inner-spacer nopadding">
                <div class="portlet-big-icon"><i class="fa fa-group"></i></div>
                <ul class="portlet-bottom-block">
                  <li class="col-md-12 col-sm-12col-xs-12"><strong>{{ count($pacientespormes) }}</strong><small>Nuevos Pacientes</small></li>
                </ul>
              </div>
            </div>
          </div>      
          <div  class="col-sm-6">
            <div class="powerwidget powerwidget-as-portlet powerwidget-as-portlet-blue">
              <header> </header>
              <div class="inner-spacer nopadding">
                <div class="portlet-big-icon"><i class="fa fa-group"></i></div>
                <ul class="portlet-bottom-block">
                  <li class="col-md-12 col-sm-12col-xs-12"><strong>{{count($citaanull)}}</strong><small>Citas anuladas</small></li>
                </ul>
              </div>
            </div>
          <br>
          </div> 
        </div>
        <div class="row">
          <div  class="col-sm-6">
            <div id="piechart_servicios"></div>
          </div>      
          <div  class="col-sm-6">
            <div id="chartventas"></div>
          </div> 
        </div>     
      </div>
    </div>
</div>

@endsection
@section('scripts')
{!! HTML::script('public/assets/js/jquery.canvasjs.min.js') !!}
<script type="text/javascript">
  
window.onload = function() {

  //idioma
  CanvasJS.addCultureInfo("es", 
    {      
      decimalSeparator: ",",// Observe ToolTip Number Format
      digitGroupSeparator: ".", // Observe axisY labels                   
      months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
      shortMonths: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
      
    });

//chart ventas
var dataPoints = [];
var jsondata = <?php echo json_encode($ventaspormes) ?>;

var options =  {
  animationEnabled: true,
  theme: "light2",
  title: {
    text: "Daily Sales Data"
  },
  culture: "es",
  axisX: {
    valueFormatString: "DD MMM",
  },
  axisY: {
    title: "BsS",
    titleFontSize: 24,
    includeZero: true
  },
  data: [{
    type: "spline", 
    dataPoints: dataPoints
  }]
};


for (var j = 0; j < jsondata.length; j++) {
    dataPoints.push({
      x: new Date((jsondata[j].date).replace(/-/g, '\/')),
      y: jsondata[j].units
    });
}
console.log(dataPoints);

$("#chartventas").CanvasJSChart(options);



//chart servicios
var jsonServices = [];
var serviciosbymes = <?php echo json_encode($jsonserviciomes) ?>;

for (var j = 0; j < serviciosbymes.length; j++) {
    jsonServices.push({
      label: serviciosbymes[j].nombre,
      y: serviciosbymes[j].porcentaje
    });
  }

var options1 = {
  title: {
    text: "Servicios realizados en el mes"
  },
  data: [{
      type: "pie",
      startAngle: 45,
      showInLegend: "true",
      legendText: "{label}",
      indexLabel: "{label} ({y})",
      yValueFormatString: "##0.00\"%\"",
      dataPoints: jsonServices
  }]
};
$("#piechart_servicios").CanvasJSChart(options1);
}  
</script>
@endsection