@extends('layouts.app')

@section('page-title',  trans('app.auth_and_registration'))

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
    <div class="container-fluid">
        <header class="text-center">
            <h2>{{ trans('app.auth_and_registration') }}
            <small>{{trans('app.change_password')}}</small></h2>
        </header>
        <div class="inner-spacer">
          <div class="row">
            <div class="inner-spacer">
              {!! Form::open(['route' => ['user.password.update'], 'method' => 'PUT', 'id' => 'form-modal', 'class' => 'form-horizontal']) !!}
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.password')">@lang('app.password') <span class="required">*</span>
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                {!! Form::password('password', ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'password']) !!}
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.password_confirmation')">@lang('app.confirm_password') <span class="required">*</span>
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                {!! Form::password('password_confirmation', ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'password_confirmation']) !!}
                </div>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary col-md-2 col-sm-2 col-xs-12 col-sm-offset-3 col-xs-offset-1">@lang('app.change_password')</button>
              </div>
            {!! Form::close() !!}
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
