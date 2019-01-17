 <table class="table table-striped table-hover" id="table-2">
  <thead>
    <th>Servicios</th>
    <th>Fecha</th>
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
      <td>{{$sales->date}}</td>
      <td>{{$sales->patient->full_name}}</td>
      <td>{{$sales->specialists->full_name}}</td>
      <td>@if($sales->bill == 1) <a class="btn btn-success change_bill" data-id="{{$sales->id}}" data-url="{{route('change.bill')}}"><i class="fa fa-check"></i></span></a>@else<a class="btn btn-default change_bill" data-id="{{$sales->id}}" data-url="{{route('change.bill')}}"><i class="fa fa-minus-circle"></i></a>@endif</td>
      <td>@if($sales->charged) <a class="btn btn-success change_charged" data-id="{{$sales->id}}" data-url="{{route('change.charged')}}"><i class="fa fa-check"></i></a>@else<a class="btn btn-default change_charged" data-id="{{$sales->id}}" data-url="{{route('change.charged')}}"><i class="fa fa-minus-circle"></i></a>@endif</td>
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
