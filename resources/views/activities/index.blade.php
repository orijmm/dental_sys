@extends('layouts.app')

@section('page-title', trans('app.activity_log'))

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
    <div class="powerwidget cold-grey">
        <header>
            <h2>{{ trans('app.activity_log') }}
            <small>
            @if($user)
              {{ $user->full_name() }}
            @else
            {{trans('app.activity_log_all_users')}}
            @endif
            </small>
            </h2>
        </header>
        <div class="inner-spacer">
          <div class="row">
            @include('partials.status')
            @include('partials.search')
          </div>

          <div class="row">
            <div class="inner-spacer">
              <div id="content-table">
                @include('activities.list')
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

@endsection
