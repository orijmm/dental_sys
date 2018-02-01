@extends('layouts.auth')

@section('page-title', trans('app.login'))

@section('content') 

<div class="center-block">
  <div class="login-block">
  {!! Form::open(['url' => '/authenticate', 'class'=>'orb-form', 'id' => 'login-form']) !!}
      <header>
        <div class="image-block">
        <a href="{{ url('login') }}"><img alt="{{ Settings::get('app_name') }}" src="{{ url('public/assets/images/logos/logo.png') }}"></a>
        </div>
        @lang('app.login_to') {{ Settings::get('app_name') }} 
        @if (Settings::get('reg_enabled'))
        <small><h4><a href="{{ url('registration') }}">@lang('app.dont_have_an_account')</a></h4></small>
        @endif
      </header>
      <fieldset>
        <section>
          <label class="label">@lang('app.email_or_username')</label>
            <label class="input"> <i class="icon-append fa fa-user"></i>
              <input type="text" name="username" id="username" value="{{ old('username') }}" required="required">
            </label>
        </section>
        <section>
            <label class="label">@lang('app.password')</label>
            <label class="input"> <i class="icon-append fa fa-lock"></i>
              <input type="password" name="password" id="password" required="required">
            </label>
            @if (Settings::get('forgot_password'))
              <div class="note"><a href="{{url('password/remind')}}">@lang('app.i_forgot_my_password')</a></div>
            @endif
        </section>
        @if (Settings::get('remember_me'))
          <section>
            <label class="checkbox">
              <input type="checkbox" name="remember" id="remember" value="1" checked>
              <i></i>@lang('app.remember_me')
            </label>
          </section>
        @endif
      </fieldset>
      <footer>
        {!! Form::submit(trans('app.log_in'), ['class' => 'btn btn-default']) !!}
      </footer>
    {!! Form::close() !!}
  </div>
  @include('copyrights')
</div>

@endsection