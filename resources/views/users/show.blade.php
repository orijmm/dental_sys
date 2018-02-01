@extends('layouts.app')

@section('page-title', trans('app.user'))

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
  <div class="powerwidget cold-grey">
      <header>
          <h2>{{ trans('app.user') }}
          <small>{{ $user->full_name() }}</small></h2>
      </header>
      <div class="inner-spacer">
        <div class="row">
          <div class="inner-spacer">
            <!--Profile-->
            <div class="user-profile">
                <div class="main-info">
                  <div class="user-img"><img src="{!! $user->avatar() !!}" height="150" width="150" alt="User Picture" /></div>
                  <h1>{{ $user->full_name() }}</h1>
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
                <div class="user-profile-info">
                  <div class="tabs-white">
                    <ul id="myTab" class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#home" data-toggle="tab">@lang('app.details')</a></li>
                      <li><a href="#activity" data-toggle="tab">@lang('app.latest_activity')</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div class="tab-pane in active" id="home">
                        <div class="profile-header">@lang('app.profile')</div>
                          <table class="table">
                            <tr>
                              <td><strong>@lang('app.email'):</strong></td>
                              <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td><strong>@lang('app.phone'):</strong></td>
                              <td>{{ $user->phones }}</td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td><strong>@lang('app.birth'):</strong></td>
                              <td>{{ $user->birthday }}</td>
                              <td></td>
                              <td></td>
                            </tr>
                             <tr>
                              <td><strong>@lang('app.address'):</strong></td>
                              <td>{{ $user->address }}</td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td><strong>@lang('app.last_logged_in'):</strong></td>
                              <td>{{ $user->last_login }}</td>
                              <td></td>
                              <td></td>
                            </tr>
                          </table>
                      </div>
                      <div class="tab-pane" id="activity">
                        <div class="profile-header">@lang('app.latest_activity')</div>              
                            <ul class="tmtimeline">
                               @foreach($activities as $activity)
                              <li>
                                <time class="tmtime"><span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $activity->created_at)->format('d-m-Y') }}</span> <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $activity->created_at)->format('G:ia') }}</span></time>
                                <div class="tmicon bg-cold-grey fa-check"></div>
                                <div class="tmlabel">
                                  <p>{{ $activity->description }}</p>
                                </div>
                              </li>
                              @endforeach
                            </ul>
                            <div class="inner-spacer">
                            <div class="row">
                              <a href="{{ route('activity.index').'?user='.$user->id }}" class="btn btn-default">@lang('app.view_all')</a>
                            </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!--/Profile--> 
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
