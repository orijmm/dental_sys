<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Settings('app_name') }} | @yield('page-title')</title>

    <!-- Styles -->
    {!! HTML::style("public/vendors/bootstrap/dist/css/bootstrap.min.css") !!}
    <!-- font-awesome.css -->
    {!! HTML::style("public/vendors/font-awesome/css/font-awesome.min.css") !!}
    <!-- Animate.css -->
    {!! HTML::style("public/assets/css/animate.min.css") !!}
    <!-- sweetalert -->
    {!! HTML::style("public/assets/css/sweetalert.min.css") !!}
    <!-- PNotify -->
    {!! HTML::style("public/vendors/pnotify/dist/pnotify.css") !!}
    {!! HTML::style("public/vendors/pnotify/dist/pnotify.buttons.css") !!}
    {!! HTML::style("public/vendors/pnotify/dist/pnotify.nonblock.css") !!}
    <!-- Custom Theme Style -->
    {!! HTML::style("public/assets/css/custom.css") !!}
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  
</head>
<body>
    
    <div class="loader loader-default" id="loading"></div>

    <div class="colorful-page-wrapper">   
        @yield('content')
    </div>

    <!-- Scripts -->

    <!--JQuery--> 
    {!! HTML::script('public/vendors/jquery/dist/jquery.min.js') !!}

    <!--Bootstrap--> 
    {!! HTML::script('public/vendors/bootstrap/dist/js/bootstrap.min.js') !!}

    <!--sweet alert--> 
    {!! HTML::script('public/assets/js/sweetalert/sweetalert.min.js') !!}

    @include('sweet::alert')

    <!-- PNotify -->
    {!! HTML::script('public/vendors/pnotify/dist/pnotify.js') !!}
    {!! HTML::script('public/vendors/pnotify/dist/pnotify.buttons.js') !!}
    {!! HTML::script('public/vendors/pnotify/dist/pnotify.nonblock.js') !!}

    <script>
        function notify(type, message){
            new PNotify({
              text: message,
              type: type,
              hide: true,
              styling: 'bootstrap3'
            });
        }

        function showLoading() {
            $('#loading').addClass('is-active');
        }

        function hideLoading() {
            $('#loading').removeClass('is-active'); 
        }

        
        $(document).ready(function() {

          $('form').keypress(function(e){   
            if(e == 13){
              return false;
            }
          });

          $('input').keypress(function(e){
            if(e.which == 13){
              return false;
            }
          });

        });

      $(document).on('click', '.btn-submit', function (e) {
          e.preventDefault();
          showLoading();
          var $this = $(this);
          var form = $('#login-form');
          $.ajax({
              url: form.attr('action'),
              type: form.attr('method'),
              data: form.serialize(),
              dataType: 'json',
              success: function(response) {
                  hideLoading();
                  if(response.success){
                      notify('success', response.message);
                      form.get(0).reset();
                      if(response.url_return) {
                          showLoading();
                          window.location.href = response.url_return;
                      }
                  } else {
                    if(response.validator) {
                      var message = '';
                      $.each(response.message, function(key, value) {
                        message += value+' ';
                      });
                      notify('error', message);
                    } else {
                      notify('error', response.message);
                    }
                  }
              },
              error: function (status) {
                  hideLoading();
                  notify('error', status.statusText);
              }
          });
      });

    </script>

    @include('partials.messages')

    @yield('scripts')
</body>
</html>
