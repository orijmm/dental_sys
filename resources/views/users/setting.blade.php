@extends('layouts.app')

@section('page-title', trans('app.setting'))

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
    <div class="powerwidget cold-grey">
        <header>
            <h2>{{ trans('app.setting') }}
            <small>{{trans('app.settings_users')}}</small></h2>
        </header>
        <div class="inner-spacer">
          <div class="row">
            <div class="inner-spacer">
              {!! Form::open(['route' => 'user.setting.update', 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.language_default')">@lang('app.language_default')
                </label>
                <div class="col-md-5 col-sm-4 col-xs-12">
                  {!! Form::select('lang', $languages, $user->lang, ['class' => 'form-control select2_single']) !!}
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary col-md-2 col-sm-2 col-xs-12 col-sm-offset-3 col-xs-offset-1">@lang('app.update')</button>
              </div>
            {!! Form::close() !!}
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
