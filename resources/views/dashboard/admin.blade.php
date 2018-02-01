@extends('layouts.app')

@section('page-title', trans('app.home'))

@section('content')

<!--Jumbotron-->
<div class="jumbotron jumbotron6">
  <h1>@lang('app.welcome') <strong> {{ Auth::user()->username ?: Auth::user()->full_name() }}</strong></h1>
</div>
<!--/Jumbotron--> 

<!-- Widget Row Start grid -->
<div class="row">

      <div class="col-md-3 col-sm-6 bootstrap-grid">        
        <!-- New widget -->
        <div class="powerwidget powerwidget-as-portlet powerwidget-as-portlet-cold-grey">
          <header></header>
          <div class="inner-spacer nopadding">
            <div class="portlet-big-icon"><i class="fa fa-user"></i></div>
            <ul class="portlet-bottom-block">
              <li class="col-md-12 col-sm-12 col-xs-12"><strong>{{ $stats['new'] }}</strong><small>@lang('app.new_users_this_month')</small></li>
            </ul>
          </div>
        </div>
        <!-- /New widget --> 
      </div>

      <div class="col-md-3 col-sm-6 bootstrap-grid"> 
            <!-- New widget -->
            <div class="powerwidget powerwidget-as-portlet powerwidget-as-portlet-blue">
              <header> </header>
              <div class="inner-spacer nopadding">
                <div class="portlet-big-icon"><i class="fa fa-group"></i></div>
                <ul class="portlet-bottom-block">
                  <li class="col-md-12 col-sm-12col-xs-12"><strong>{{ $stats['total'] }}</strong><small>@lang('app.total_users')</small></li>
                </ul>
              </div>
            </div>
            <!-- /New widget -->            
      </div>
      <!-- /Inner Row Col-md-3 -->
      
      <div class="col-md-3 col-sm-6 bootstrap-grid"> 
        <!-- New widget -->
        <div class="powerwidget powerwidget-as-portlet powerwidget-as-portlet-red">
          <header> </header>
          <div class="inner-spacer nopadding">
            <div class="portlet-big-icon"><i class="fa fa-times"></i></div>
            <ul class="portlet-bottom-block">
              <li class="col-md-12 col-sm-12 col-xs-12"><strong>{{ $stats['banned'] }}</strong><small>@lang('app.banned_users')</small></li>
            </ul>
          </div>
        </div>
        <!-- /New widget --> 
        
      </div>
      <!-- /Inner Row Col-md-3 -->
      
      <div class="col-md-3 col-sm-6 bootstrap-grid"> 
        <!-- New widget -->
        <div class="powerwidget powerwidget-as-portlet powerwidget-as-portlet-green"data-widget-editbutton="false">
          <header> </header>
          <div class="inner-spacer nopadding">
            <div class="portlet-big-icon"><i class="fa fa-check"></i></div>
            <ul class="portlet-bottom-block">
              <li class="col-md-12 col-sm-12 col-xs-12"><strong>{{ $stats['unconfirmed'] }}</strong><small>@lang('app.unconfirmed_users')</small></li>
            </ul>
          </div>
        </div>
        <!-- /New widget --> 
        
      </div>
    <!-- /Inner Row Col-md-3 -->
    <div class="clearfix"></div>
  <!-- /Inner Row Col-md-12 --> 
</div>
<!-- /Widgets Row End Grid-->  

@stop

@section('scripts')

@stop