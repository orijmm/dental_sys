@if($option2)
<table class="table table-striped table-hover" id="table-2">
  <thead>
      <th>Codigo</th>
      <th>Paciente</th>
      <th>Especialista</th>
      <th>Acciones</th>
  </thead>
  <tbody>
  @foreach($history as $histories)
    <tr>
      <td>N° {{str_pad($histories->id, 4, '0', STR_PAD_LEFT)}}</td>
      <td>{{$histories->patient->full_name}}</td>
      <td>{{$histories->specialist->full_name}}</td>
      <td><a href="{{route('history.show', $histories->id)}}"><button class="btn btn-info pull-right"><i class="fa fa-eye"></i> Mostrar Historial</button></a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@else
  <div class="well">
    <ul   class="list-unstyled">
      <li><a href="{{route('history.show', $history->id)}}"><button class="btn btn-info pull-right"><i class="fa fa-eye"></i> Mostrar Historial</button></a></li>
      <li>Historia N° {{str_pad($history->id, 4, '0', STR_PAD_LEFT)}}</li>
      <li>Paciente: {{$history->patient->full_name}}</li>
      <li>Especialista: {{$history->specialist->full_name}}</li>
    </ul>    
  </div>
@endif

<script type="text/javascript">
  $(document).ready(function() {
    $('#table-2').DataTable(); 
});
</script>
