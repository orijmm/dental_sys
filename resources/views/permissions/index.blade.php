@extends('layouts.app')

@section('page-title', trans('app.permissions'))

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
    <div class="container-fluid">
        <header class="text-center">
            <h2>{{ trans('app.permissions') }}
            <small>{{trans('app.available_system_permissions')}}</small></h2>
        </header>
        <div class="inner-spacer">
          <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12 margin-bottom">
               <a href="javascript:void(0)" data-href="{{ route('permission.create') }}" class="btn btn-success create-edit-show" data-model="modal" title="@lang('app.create_permission')">
                  <i class="fa fa-plus"></i>
                  @lang('app.add_permission')
              </a>
            </div>
          </div>
          {!! Form::open(['route' => 'permission.save']) !!}
          <div class="row">
            <div class="inner-spacer">
              <div id="content-table">
                @include('permissions.list')
              </div>
              @if (count($permissions))
               <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12 margin-bottom">
                   <button type="submit" class="btn btn-primary">@lang('app.save_permissions')
                  </button>
                </div>
              </div>
              @endif
            </div>
          </div>
          {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
