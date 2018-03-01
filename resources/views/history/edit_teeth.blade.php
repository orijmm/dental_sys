<div class="modal-body">
{!! Form::model($teeth, ['route' => ['teeth.update', $teeth->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-4">
      Seleccione:
    <select class="form-control">
      <option value="">Seleccione</option>
      <option value="1">Caries</option>
      <option value="2">Recina</option>
      <option value="2">Amalgama</option>
      <option value="2">Sellante</option>
      <option value="2">Sellante Indicado</option>
      <option value="2">Extranción Indicada</option>
      <option value="2">Con edodoncia</option>
      <option value="2">Protesis</option>
      <option value="2">Necrosís pulpar</option>
      <option value="2">Protesis</option>
      <option value="2">fdsfdsf</option>
    </select>
  </div>
  <div class="col-md-4">
    <table width="100px">
    <tr>
      <td>&nbsp;</td>
      <td  style="border: 2px solid #fff" bgcolor="#ddd">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td style="border: 2px solid #fff" bgcolor="#ddd">&nbsp;</td>
      <td style="border: 2px solid #fff" bgcolor="#ddd">&nbsp;</td>
      <td style="border: 2px solid #fff" bgcolor="#ddd">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td style="border: 2px solid #fff" bgcolor="#ddd">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    </table>
  </div>
  <div class="col-md-2"></div>
</div>
</form>
</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-success">Guardar</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>
{!! Form::close() !!}
