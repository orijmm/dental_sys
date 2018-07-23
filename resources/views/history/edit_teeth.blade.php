{!! Form::model($teeth, ['route' => ['teeth.put.update', $teeth->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'form-modal']) !!}
<div class="modal-body">
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-4">
      Seleccione:
    {!!Form::select('elect_odonto', ['Selecione','Caries','Recina', 'Amalgama', 'Sellante', 'Sellante Indicado', 'Extranción Indicada', 'Con edodoncia', 'Protesis', 'Necrosís pulpar','Protesís indicada','Clinicamente ausente'],null, ['placeholder' => 'Seleccione', 'class' => 'form-control', 'id' => 'elect_odonto'])!!}
  </div>
  <div class="col-md-4">
    <div class="gb_all"></div>
    <input type="hidden" name="inputone" id="inputone">
    <table width="100px" class="table_odonto">
    <tr>
      <td>&nbsp;</td>
      <td class="odonto_teeth" data-odoc="1" style="border: 2px solid #fff">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="odonto_teeth" data-odoc="4"   style="border: 2px solid #fff">&nbsp;</td>
      <td class="odonto_teeth" data-odoc="5"  style="border: 2px solid #fff">&nbsp;</td>
      <td class="odonto_teeth" data-odoc="2"  style="border: 2px solid #fff">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="odonto_teeth" data-odoc="3"  style="border: 2px solid #fff">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    </table>
  </div>
  <div class="col-md-2"></div>
</div>

</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-success btn-submit" data-odonto="modal">Guardar</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>
{!! Form::close() !!}
