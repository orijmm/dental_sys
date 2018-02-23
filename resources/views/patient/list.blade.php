 <table class="table table-striped table-hover" id="table-2">
  <thead>
    <th>Nombre y Apellido</th>
    <th>Cédula</th>
    <th>Edad</th>
    <th>Teléfono</th>
    <th>Acciones</th>
  </thead>
<tbody>
  @if(count($patient))
    @foreach($patient as $patients)
  <tr>
      <td>{{$patients->full_name}}</td>
      <td>{{$patients->dni}}</td>
      <td>{{$patients->getAge()}}</td>
      <td>{{$patients->phone}}</td>
      <td>
        <a href="{{route('patient.show',$patients->id)}}" class="btn btn-info"><i class="fa fa-info"></i></a>
        <a href="{{route('patient.edit',$patients->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
        <a type="button" data-href="{{route('patient.destroy',$patients->id)}}" 
                  class="btn btn-round btn-danger btn-delete" 
                  data-confirm-text="Estas seguro de borrar?"
                  data-confirm-delete="Si"
                  title="Borrar" data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-trash-o"></i>
                </a>
      </td>
  </tr>
    @endforeach
  @endif
</tbody>
</table>
