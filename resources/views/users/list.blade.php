 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <th>@lang('app.role')</th>
      <th>@lang('app.full_name')</th>
      <th>@lang('app.email')</th>
      <th>@lang('app.registration_date')</th>
      <th>@lang('app.status')</th>
      <th class="text-center">@lang('app.actions')</th>
    </thead>
<tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->roles->first()->display_name }}</td>
            <td>{{ $user->full_name() }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{!! $user->labelStatus() !!}</td>
            <td class="text-center">
              @if (config('session.driver') == 'database')
                <a type="button" data-href="{{ route('user.sessions', $user->id) }}" class="btn btn-round btn-primary create-edit-show" data-model="modal"
                   title="@lang('app.user_sessions')" data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-list"></i>
                </a>
              @endif
                <a href="{{ route('user.show', $user->id) }}" class="btn btn-round btn-primary" title="@lang('app.show_user')" data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-eye"></i>
                </a>
                <a type="button" data-href="{{ route('user.edit', $user->id) }}" class="btn btn-round btn-primary create-edit-show" data-model="modal"
                   title="@lang('app.edit_user')" data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-pencil"></i>
                </a>
                <a type="button" data-href="{{ route('user.destroy', $user->id) }}" 
                  class="btn btn-round btn-danger btn-delete" 
                  data-confirm-text="@lang('app.are_you_sure_delete_user')"
                  data-confirm-delete="@lang('app.yes_delete_him')"
                  title="@lang('app.delete_user')" data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
<div class="ColVis">
{{ $users->links() }}
</div> 