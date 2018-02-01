<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Settings::get('app_name') }}</title>

    {!! HTML::style("public/assets/css/emails.css") !!}

</head>
<body bgcolor="#FFFFFF">

    <!-- HEADER -->
    <table class="head-wrap" bgcolor="#999999">
        <tr>
            <td></td>
            <td class="header container" >  
                <div class="content">
                <table bgcolor="#999999">
                    <tr>
                        <td><img width="150" height="150" src="{{ url('public/assets/images/logos/logo.png') }}" /></td>
                        <td align="right"><h6 class="collapse">{{ Settings::get('app_name') }}</h6></td>
                    </tr>
                </table>
                </div>      
            </td>
            <td></td>
        </tr>
    </table><!-- /HEADER -->

    @yield('content')
    
    <!-- FOOTER -->
    <table class="footer-wrap">
        <tr>
            <td></td>
            <td class="container">
            <!-- content -->
            <div class="content">
            <table>
                <tr>
                    <td align="center">
                        <p>
                            @lang('app.many_thanks'), {{ Settings::get('app_name') }}
                        </p>
                    </td>
                </tr>
            </table>
            </div><!-- /content -->     
            </td>
            <td></td>
        </tr>
    </table><!-- /FOOTER -->

</body>
</html>
