{!! Form::open(['route' => 'setting.update', 'class' => 'form-horizontal form-label-left']) !!}
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.name')">@lang('app.name') <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('app_name', Settings::get('app_name'), ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.country_default')">@lang('app.country_default') <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      {!! Form::select('country_default', $countries, Settings::get('country_default'), ['class' => 'form-control col-md-7 col-xs-12 select2_single']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.language_default')">@lang('app.language_default')
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      {!! Form::select('language_default', $languages, Settings::get('language_default'), ['class' => 'form-control col-md-7 col-xs-12 select2_single']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.timezone')">@lang('app.timezone')
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      {!! Form::select('timezone', $timezones, Settings::get('timezone'), ['class' => 'form-control select2_single']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.coin')">@lang('app.coin') <span class="required">*</span>
    </label>
    <div class="col-md-4 col-sm-4 col-xs-12">
    {!! Form::text('coin', Settings::get('coin'), ['class' => 'form-control']) !!}
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.allow_remember_me')">@lang('app.allow_remember_me')</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="hidden" name="reg_enabled" value="0">
       {!! Form::checkbox('remember_me', 1, Settings::get('remember_me'), ['class' => 'js-switch']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.forgot_password')">@lang('app.forgot_password')</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="hidden" name="forgot_password" value="0">
       {!! Form::checkbox('forgot_password', 1, Settings::get('forgot_password'), ['class' => 'js-switch']) !!}
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.terms_and_conditions_show')">@lang('app.terms_and_conditions_show')</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="hidden" name="terms_and_conditions_show" value="0">
       {!! Form::checkbox('terms_and_conditions_show', 1, Settings::get('terms_and_conditions_show'),
                ['class' => 'js-switch']) !!}
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.allow_registration')">@lang('app.allow_registration')</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="hidden" name="reg_enabled" value="0">
       {!! Form::checkbox('reg_enabled', 1, Settings::get('reg_enabled'), ['class' => 'js-switch']) !!}
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="@lang('app.email_confirmation')">@lang('app.email_confirmation')</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="hidden" name="reg_email_confirmation" value="0">
       {!! Form::checkbox('reg_email_confirmation', 1, Settings::get('reg_email_confirmation'), ['class' => 'js-switch']) !!}
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary col-md-2 col-sm-2 col-xs-12 col-sm-offset-3 col-xs-offset-1">@lang('app.update')</button>
  </div>
{!! Form::close() !!}