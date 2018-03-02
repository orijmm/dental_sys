 <table class="table table-striped table-hover" id="table-2">
  <thead>
    <th>Especialidad</th>
    <th>Acciónes</th>
  </thead>
<tbody>
  @if(count($specialty))
    @foreach($specialty as $especialidad)
  <tr>
      <td>{{$especialidad->name}}</td>
      <td><a href="{{route('specialty.edit', $especialidad->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
          <a type="button" data-href="{{route('specialty.destroy',$especialidad->id)}}" 
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
<div class="ColVis">
{{ $specialty->links() }}
</div>
