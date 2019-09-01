@extends('layouts.app')

@section('page-title', trans('app.concepts'))

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
    <div class="container-fluid">
        <header class="text-center">
            <h2>{{ trans('app.concepts') }}
            <small>{{trans('app.available_concepts')}}</small></h2>
        </header>
        <div class="inner-spacer">
          <div class="row">
            @include('partials.search') 

            <div class="col-md-2 col-sm-2 col-xs-12 margin-bottom">
               <a href="javascript:void(0)" data-href="{{ route('conceptoGasto.create') }}" class="btn btn-success create-edit-show" data-model="modal" title="@lang('app.create_concept')">
                  <i class="fa fa-plus"></i>
                  @lang('app.add_concept')
              </a>
            </div>
          </div>

          <div class="row">
            <div class="inner-spacer">
              <div id="content-table">
                @include('conceptoGasto.list')
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

@endsection
