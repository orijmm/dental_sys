 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <th>@lang('app.type_register')</th>
      <th>@lang('app.username')</th>
      <th>@lang('app.description')</th>
      <th>@lang('app.registration_date')</th>
    </thead>
<tbody>
    @foreach ($activities as $activity)
        <tr>
            <td>{{ trans('app.'.$activity['log_name']) }}</td>
            <td>{{ $activity->causer['name'].' '.$activity->causer['lastname'] }}</td>
            <td>{{ $activity->description }}</td>
            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $activity->created_at)->format('d-m-Y G:ia') }}</td>
        </tr>
    @endforeach
</tbody>
</table>
<div class="ColVis">
{{ $activities->links() }}
</div> 