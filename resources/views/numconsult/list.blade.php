<table class="table table-striped table-hover" id="table-2">
  <thead>
    <th>Consultorios</th>
    <th>Acciones</th>
  </thead>
<tbody>
  @if(count($numconsult))
    @foreach($numconsult as $nconsul)
    <tr>
        <td>Consultorio {{$nconsul->name_consult}}</td>
        <td>
          <a type="button" data-href="{{route('numconsult.destroy',$nconsul->id)}}" 
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