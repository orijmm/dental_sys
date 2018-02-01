@extends('emails.layout')

@section('content')

<!-- BODY -->
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">
			<div class="content">
			<table>
				<tr>
					<td>
						<h3>@lang('app.thank_you_for_registering', ['app' => Settings::get('app_name')])</h3>
						<p class="lead">@lang('app.confirm_email_on_link_below').</p>
						<!-- Callout Panel -->
						<p class="callout">
							<a href="{{ route('confirm.email', $token) }}" target="_blank">@lang('app.confirm_email')</a>
						</p><!-- /Callout Panel -->	
						<p class="lead">@lang('app.if_you_cant_click')</p>
						<p class="callout">{{ route('confirm.email', $token) }}</p>							
					</td>
				</tr>
			</table>
			</div><!-- /content -->					
		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

@endsection