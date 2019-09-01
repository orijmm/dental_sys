 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <th>@lang('app.name')</th>
        <th>@lang('app.user')</th>        
        <th class="text-center">@lang('app.actions')</th>
        </thead>
    <tbody>
        @foreach ($conceptos as $concepto)
            <tr>
                <td>{{ strtoupper($concepto->detalle) }}</td>
                <td>{{ strtoupper($concepto->user->name).' '.strtoupper($concepto->user->lastname) }}</td>
                <td class="text-center">
                    <a type="button" data-href="{{ route('conceptoGasto.edit', $concepto->id) }}" class="btn btn-round btn-primary create-edit-show" data-model="modal"
                       title="@lang('app.edit_concepto')" data-toggle="tooltip" data-placement="top">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a type="button" data-href="{{ route('conceptoGasto.destroy', $concepto->id) }}" 
                      class="btn btn-round btn-danger btn-delete" 
                      data-confirm-text="@lang('app.are_you_sure_delete_concept')"
                      data-confirm-delete="@lang('app.yes_delete_him')"
                      title="@lang('app.delete_user')" data-toggle="tooltip" data-placement="top">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $conceptos->links() }}