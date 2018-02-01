<div class="modal-body">
  <h3>{{ $user->full_name() }}</h3>
  </br>
 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <th>@lang('app.ip_address')</th>
      <th>@lang('app.user_agent')</th>
      <th>@lang('app.last_activity')</th>
      @if (Auth::User()->hasRole('admin'))
      <th class="text-center">@lang('app.actions')</th>
      @endif
    </thead>
<tbody>
    @foreach ($sessions as $session)
        <tr>
            <td>{{ $session->ip_address }}</td>
            <td>{{ $session->user_agent }}</td>
            <td>{{ \Carbon\Carbon::createFromTimestamp($session->last_activity)->format('Y-m-d H:i:s') }}</td>
            @if (Auth::User()->hasRole('admin'))
            <td class="text-center">
                <a type="button" data-href="{{ route('user.sessions.invalidate', $session->id) }}" 
                  class="btn btn-round btn-danger btn-delete" 
                  data-confirm-text="@lang('app.are_you_sure_delete_session')"
                  data-confirm-delete="@lang('app.yes_delete_him')"
                  title="@lang('app.delete_session')" data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>
            @endif
        </tr>
    @endforeach
</tbody>
</table>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default col-sm-2 col-xs-5" data-dismiss="modal">@lang('app.close')</button>
</div>

