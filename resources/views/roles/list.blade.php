 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <th>@lang('app.name')</th>
        <th>@lang('app.display_name')</th>
        <th>@lang('app.description')</th>
        <th class="text-center">@lang('app.actions')</th>
        </thead>
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->description }}</td>
                <td class="text-center">
                    <a type="button" data-href="{{ route('role.edit', $role->id) }}" class="btn btn-round btn-primary create-edit-show" data-model="modal"
                       title="@lang('app.edit_role')" data-toggle="tooltip" data-placement="top">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a type="button" data-href="{{ route('role.destroy', $role->id) }}" 
                      class="btn btn-round btn-danger btn-delete" 
                      data-confirm-text="@lang('app.are_you_sure_delete_role')"
                      data-confirm-delete="@lang('app.yes_delete_him')"
                      title="@lang('app.delete_user')" data-toggle="tooltip" data-placement="top">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $roles->links() }}
 