@if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::get('sweet_alert.alert') !!});
    </script>
    {{ Session::forget('sweet_alert.alert') }} 
@endif