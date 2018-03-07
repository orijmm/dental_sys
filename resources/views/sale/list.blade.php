 <table class="table table-striped table-hover" id="table-2">
  <thead>
    <th>Servicios</th>
    <th>Paciente</th>
    <th>Especialista</th>
    <th>Facturado</th>
    <th>Pagado</th>
    <th>Acciónes</th>
  </thead>
<tbody>
  @if(count($sale))
    @foreach($sale as $sales)
  <tr>
      <td>@foreach($sales->services as $services)
      {{$services->name}}<br>
      @endforeach</td>
      <td>{{$sales->patient->full_name}}</td>
      <td>{{$sales->specialists->full_name}}</td>
      <td>@if($sales->bill) <span class="btn btn-success"><i class="fa fa-check"></i></span>@else<span class="btn btn-default"><i class="fa fa-minus-circle"></i></span>@endif</td>
      <td>@if($sales->charged) <span class="btn btn-success"><i class="fa fa-check"></i></span>@else<span class="btn btn-default"><i class="fa fa-minus-circle"></i></span>@endif</td>
      <td><a href="{{route('sale.edit', $sales->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
          <a type="button" data-href="{{route('sale.destroy',$sales->id)}}" 
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
{{ $sale->links() }}
</div>
