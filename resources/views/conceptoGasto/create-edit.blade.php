<div class="modal-body">
@if($edit)
{!! Form::model($concepto, ['route' => ['conceptoGasto.update', $concepto->id], 'method' => 'PUT', 'id' => 'form-modal', 'class' => 'form-horizontal']) !!}
@else
 {!! Form::open(['route' => 'conceptoGasto.store', 'id' => 'form-modal', 'class' => 'form-horizontal']) !!}
@endif
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.name')">@lang('app.name') <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('detalle', old('detalle'), ['class' => 'form-control', 'id' => 'detalle']) !!}

    {{ Form::hidden('user_id', auth()->user()->id ) }}

    </div>
  </div>
</div>
<div class="modal-footer">
  @if($edit)
    <button type="submit" class="btn btn-primary btn-submit col-sm-2 col-xs-6">@lang('app.update')</button>
  @else
      <button type="submit" class="btn btn-primary btn-submit col-sm-2 -xs-6">@lang('app.save')</button>
  @endif
  <button type="button" class="btn btn-default col-sm-2 col-xs-5" data-dismiss="modal">@lang('app.close')</button>
</div>
{!! Form::close() !!}

