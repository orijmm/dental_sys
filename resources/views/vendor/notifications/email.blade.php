<p>@lang('app.request_for_password_reset_made')</p>

<p>@lang('app.click_on_link_below')</p>

<a href="{{ $actionUrl }}" target="_blank">@lang('app.reset_password')</a> <br/><br/>

<p>@lang('app.if_you_cant_click')</p>

<p>{{ $actionUrl }}</p>

@lang('app.many_thanks'), <br/>
{{ Settings::get('app_name') }}
