@extends('layouts.app')

@section('page-title', trans('app.users'))

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
    <div class="powerwidget cold-grey">
        <header>
            <h2>{{ trans('app.users') }}
            <small>{{trans('app.list_of_registered_users')}}</small></h2>
        </header>
        <div class="inner-spacer">
          <div class="row">
            @include('partials.status')
            @include('partials.search') 

            <div class="col-md-2 col-sm-2 col-xs-12 margin-bottom">
               <a href="javascript:void(0)" data-href="{{ route('user.create') }}" class="btn btn-success create-edit-show" data-model="modal" title="@lang('app.create_user')">
                  <i class="fa fa-plus"></i>
                  @lang('app.add_user')
              </a>
            </div>
          </div>

          <div class="row">
            <div class="inner-spacer">
              <div id="content-table">
                @include('users.list')
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
 
@endsection