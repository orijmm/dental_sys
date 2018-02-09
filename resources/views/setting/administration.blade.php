@extends('layouts.app')

@section('page-title', trans('app.setting'))

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 bootstrap-grid margin-bottom">
    <div class="container-fluid">
        <header class="text-center">
            <h2>{{ trans('app.setting') }}
            <small>{{trans('app.manage_general_system_settings')}}</small></h2>
        </header>
        <div class="inner-spacer">
          <div class="row">
            <div class="inner-spacer">
              <div id="content-table">
                @include('setting.administration_field')
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

@endsection

@section('styles')
    <!-- Switchery -->
    {!! HTML::style("public/vendors/switchery/dist/switchery.min.css") !!}
@endsection

@section('scripts')
    <!-- Switchery -->
    {!! HTML::script('public/vendors/switchery/dist/switchery.min.js') !!}
    <!-- Select2 -->
  {!! HTML::script('public/vendors/select2/dist/js/select2.full.min.js') !!}

  <script type="text/javascript">
    $(".select2_single").select2({
      placeholder: "@lang('app.selected_item')"
    });
  </script>

@endsection