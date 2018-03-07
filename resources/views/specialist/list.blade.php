 <table class="table table-striped table-hover" id="table-2">
  <thead>
    <th>Nombre y Apellido</th>
    <th>Cédula</th>
    <th>Email</th>
    <th>Teléfono</th>
    <th>Estado</th>
    <th>Especialidad</th>
    <th>Acciones</th>
  </thead>
<tbody>
  @if(count($specialist))
    @foreach($specialist as $specialista)
  <tr>
      <td>{{$specialista->name}} {{$specialista->last_name}}</td>
      <td>{{$specialista->dni}}</td>
      <td>{{$specialista->email}}</td>
      <td>{{$specialista->phone}}</td>
      <td>@if($specialista->status == '1') <button class="btn btn-success btn-sm">Activo</button> @else <button class="btn btn-default btn-sm">Inactivo</button> @endif</td>
      <td>{{$specialista->specialties->name}}</td>
      <td>
        @permission(('especialistas.editar'))
        <a href="{{route('specialist.show', $specialista->id)}}" class="btn btn-info"><i class="fa fa-info"></i></a>
        <a href="{{route('specialist.edit', $specialista->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
        <a type="button" data-href="{{route('specialist.destroy', $specialista->id)}}" 
                  class="btn btn-round btn-danger btn-delete" 
                  data-confirm-text="Estas seguro de borrar?"
                  data-confirm-delete="Si"
                  title="Borrar" data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-trash-o"></i>
                </a>
        @endpermission
      </td>
  </tr>
    @endforeach
  @endif
</tbody>
</table>
<div class="ColVis">
{{ $specialist->links() }}
</div>