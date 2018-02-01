@extends('layouts.auth')

@section('page-title', trans('app.reset_password'))

@section('content') 

<div class="center-block">
  <div class="login-block">
  {!! Form::open(['url' => '/password/reset', 'class'=>'orb-form', 'method' => 'post', 'id' => 'login-form']) !!}
      <input type="hidden" name="token" value="{{ $token }}">
      <header>
        <div class="image-block">
        <a href="{{ url('login') }}"><img alt="{{ Settings::get('app_name') }}" src="{{ url('public/assets/images/logos/logo.png') }}"></a>
        </div>
        @lang('app.reset_password')
        <small><h4><a href="{{ url('login') }}">@lang('app.login')</a></h4></small> 
      </header>
      <fieldset>
        <section>
          <label class="label">@lang('app.email')</label>
            <label class="input"> 
              <input type="text" name="email" id="email" placeholder="@lang('app.email')" value="{{ $email }}" readonly="readonly">
            </label>
        </section>
        <section>
            <label class="label">@lang('app.password')</label>
            <label class="input"> 
              <input type="password" name="password" id="password">
            </label>
        </section>
        <section>
            <label class="label">@lang('app.confirm_password')</label>
            <label class="input"> 
              <input type="password" name="password_confirmation" id="password_confirmation">
            </label>
        </section>
      </fieldset>
      <footer>
        {!! Form::submit(trans('app.send_password_link_reset'), ['class' => 'btn btn-default btn-submit']) !!}
      </footer>
    {!! Form::close() !!}
  </div>
  @include('copyrights')
</div>

@endsection

