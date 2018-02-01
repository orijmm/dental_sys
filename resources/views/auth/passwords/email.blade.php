@extends('layouts.auth')

@section('page-title', trans('app.i_forgot_my_password'))

@section('content') 

<div class="center-block">
  <div class="login-block">
  {!! Form::open(['url' => '/password/remind', 'class'=>'orb-form', 'method' => 'post', 'id' => 'login-form']) !!}
      <header>
        <div class="image-block">
        <a href="{{ url('login') }}"><img alt="{{ Settings::get('app_name') }}" src="{{ url('public/assets/images/logos/logo.png') }}"></a>
        </div>
        @lang('app.i_forgot_my_password')
        <small><h4><a href="{{ url('login') }}">@lang('app.login')</a></h4></small> 
      </header>
      <fieldset>
        <section>
          <label class="label">@lang('app.email')</label>
            <label class="input"> 
              <input type="text" name="email" id="email" value="{{ old('email') }}">
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