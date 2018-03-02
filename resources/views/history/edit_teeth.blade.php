<div class="modal-body">
{!! Form::model($teeth, ['route' => ['teeth.update', $teeth->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'form-modal']) !!}
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-4">
      Seleccione:
    <select class="form-control" id="elect_odonto" name="elect_odonto">
      <option value="0" selected="selected">Seleccione</option>
      <option value="1">Caries</option>
      <option value="2">Recina</option>
      <option value="3">Amalgama</option>
      <option value="4">Sellante</option>
      <option value="5">Sellante Indicado</option>
      <option value="6">Extranción Indicada</option>
      <option value="7">Con edodoncia</option>
      <option value="8">Protesis</option>
      <option value="9">Necrosís pulpar</option>
      <option value="10">Protesís indicada</option>
      <option value="11">Clinicamente ausenta</option>
    </select>
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
