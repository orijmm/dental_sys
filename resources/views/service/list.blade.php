 <table class="table table-striped table-hover" id="table-2">
  <thead>
    <th>Servicio</th>
    <th>Costo</th>
    <th>Estado</th>
    <th>Acciónes</th>
  </thead>
<tbody>
  @if(count($service))
    @foreach($service as $servicios)
  <tr>
      <td>{{$servicios->name}}</td>
      <td>{{$servicios->cost}}</td>
      <td>@if($servicios->status == '1') <button class="btn btn-success btn-sm">Activo</button> @else <button class="btn btn-default btn-sm">Inactivo</button> @endif</td>
      <td><a href="{{route('service.edit', $servicios->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
          <a type="button" data-href="{{route('service.destroy',$servicios->id)}}" 
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
{{ $service->links() }}
</div>
