@extends('layouts.app')

@section('page-title', trans('app.profile'))

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
    <div class="container-fluid">
        <header class="text-center">
            <h2>{{ trans('app.profile') }}
            <small>{{trans('app.my_profile')}}</small></h2>
        </header>
        <div class="inner-spacer">
          <div class="row">
            <div class="inner-spacer">
                <div class="user-profile col-md-4 col-sm-5 col-xs-12 margin-bottom">
                  <div class="main-info">
                    {!! Form::model($user, ['route' => ['update.avatar', $user->id], 'method' => 'PUT', 'files' => 'true']) !!}
                    <div class="user-img avatar-view"><img src="{!! $user->avatar() !!}" id="avatar-view-img" height="150" width="150" alt="User Picture" /></div>
                    <br/>
                    <input style="display: none;" type="file" id="profile_image" name="avatar" value=""/>
                    <br/>
                    <button style="display: none;" type="submit" id="submit_image" class="btn btn-defult col-md-12 col-sm-12 col-xs-12"> @lang('app.change_photo')
                    </button>
                   {!! Form::close() !!}
                  </div>
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="item item1 active"> </div>
                      <div class="item item2"></div>
                      <div class="item item3"></div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-7 col-xs-12 margin-bottom">
                  {!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'PUT', 'id' => 'form-modal', 'class' => 'form-horizontal form-label-left']) !!}
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="@lang('app.username')">@lang('app.username')</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    {!! Form::text('username', old('username'), ['class' => 'form-control', 'id' => 'username']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="@lang('app.name')">@lang('app.name') <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'name']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="@lang('app.last_name')">@lang('app.last_name') <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    {!! Form::text('lastname', old('lastname'), ['class' => 'form-control', 'id' => 'lastname']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="@lang('app.email')">@lang('app.email') <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'id' => 'email']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="@lang('app.birthday')">@lang('app.birthday')
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('birthday', isset($user->birthday) ? $user->birthday : old('birthday'), ['class' => 'form-control datetime', 'id' => 'birthday', 'readonly' => 'readonly']) !!}
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="@lang('app.mobile')">@lang('app.phone_mobile') <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('phones', old('phones'), ['class' => 'form-control phones', 'id' => 'mobile', 'data-inputmask' => "'mask' : '999999999'"]) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="@lang('app.address')">@lang('app.address')
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'id' => 'address']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary col-md-3 col-sm-4 col-xs-12 col-sm-offset-3 col-xs-offset-1">@lang('app.update')</button>
                  </div>
                  {!! Form::close() !!}
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

 <!-- jquery.inputmask -->
 {!! HTML::script('public/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') !!}
 <!-- moment -->
 {!! HTML::script('public/assets/js/moment/moment.min.js') !!}
 <!-- bootstrap-daterangepicker -->
 {!! HTML::script('public/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') !!}

 <script type="text/javascript">

  $(document).on('click', '.avatar-view', function () {
    $("#profile_image").trigger('click');
  });

  $(document).on('change', '#profile_image', function () {
    $("#submit_image").show();
    showLoading();
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar-view-img').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
    hideLoading();
  });

  $(document).on('click', '#submit_image', function () {
    showLoading();
  });

  $(document).ready(function() {
    $('#birthday').datetimepicker({
      format: 'DD-MM-YYYY',
      ignoreReadonly: true,
      viewMode: 'years'
    });

    $(".phones").inputmask();

  });
  

</script>
 
@endsection