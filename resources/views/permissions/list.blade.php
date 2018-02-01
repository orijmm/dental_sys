 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <th>@lang('app.display_name')</th>
        @foreach ($roles as $role)
            <th class="text-center">{{ $role->display_name }}</th>
        @endforeach
        <th class="text-center">@lang('app.actions')</th>
        </thead>
    <tbody>
        @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->display_name }}</td>
                @foreach ($roles as $role)
                    <td class="text-center">
                        <div class="checkbox">
                            {!! Form::checkbox("roles[{$role->id}][]", $permission->id, $role->hasPermission($permission->name)) !!}
                            <label class="no-content"></label>
                        </div>
                    </td>
                @endforeach
                <td class="text-center">
                    <a type="button" data-href="{{ route('permission.edit', $permission->id) }}" class="btn btn-round btn-primary create-edit-show" data-model="modal"
                       title="@lang('app.edit_permission')" data-toggle="tooltip" data-placement="top">
                        <i class="fa fa-pencil"></i>
                    </a>
                    @if($permission->removable)
                    <a type="button" data-href="{{ route('permission.destroy', $permission->id) }}" 
                      class="btn btn-round btn-danger btn-delete" 
                      data-confirm-text="@lang('app.are_you_sure_delete_permission')"
                      data-confirm-delete="@lang('app.yes_delete_him')"
                      title="@lang('app.delete_user')" data-toggle="tooltip" data-placement="top">
                        <i class="fa fa-trash-o"></i>
                    </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
