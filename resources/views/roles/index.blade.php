@extends('layouts.app')

@section('page-title', trans('app.roles'))

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
    <div class="container-fluid">
        <header class="text-center">
            <h2>{{ trans('app.roles') }}
            <small>{{trans('app.available_system_roles')}}</small></h2>
        </header>
        <div class="inner-spacer">
          <div class="row">
            @include('partials.search') 

            <div class="col-md-2 col-sm-2 col-xs-12 margin-bottom">
               <a href="javascript:void(0)" data-href="{{ route('role.create') }}" class="btn btn-success create-edit-show" data-model="modal" title="@lang('app.create_role')">
                  <i class="fa fa-plus"></i>
                  @lang('app.add_role')
              </a>
            </div>
          </div>

          <div class="row">
            <div class="inner-spacer">
              <div id="content-table">
                @include('roles.list')
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

@endsection
