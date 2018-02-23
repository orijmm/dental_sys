<table class="table table-striped table-hover" id="table-1">
  <thead>
    <tr>
      <th>Información</th>
      <th>Fecha y hora</th>
    </tr>
  </thead>
  <tbody>
    @if(count($appointments))
      @foreach($appointments as $cita)
    <tr>
      <td><a href="{{route('appointment.show',$cita->id)}}" class="label label-info pull-right"><i class="fa fa-info fa-2x"></i></a> CONSULTORIO: {{$cita->numconsults->name_consult}}<br>ESPECIALISTA: {{$cita->specialists->full_name}}<br>PACIENTE: {{$cita->patient->full_name}}<br>CONDICIÓN: {{$cita->elije}}</td>
      <td class="bg-info"><h4><i class="fa fa-calendar"></i> {{$cita->datetime}}</h4></td>
    </tr>
      @endforeach
    @endif
  </tbody>
</table>
