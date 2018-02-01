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
							<h3>@lang('app.request_for_password_reset_made')</h3>
							<p class="lead">@lang('app.click_on_link_below')</p>
							<!-- Callout Panel -->
							<p class="callout">
								<a href="{{ url('password/reset/'.$token.'?email='.$user->email) }}">@lang('app.reset_password')</a>
							</p><!-- /Callout Panel -->	
							<p class="lead">@lang('app.if_you_cant_click')</p>
							<p class="callout">{{ url('password/reset/'.$token.'?email='.$user->email) }}</p>							
						</td>
					</tr>
				</table>
				</div><!-- /content -->					
			</td>
			<td></td>
		</tr>
	</table><!-- /BODY -->

@endsection