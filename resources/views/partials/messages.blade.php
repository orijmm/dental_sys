
@if(isset ($errors) && count($errors) > 0)
      
    @foreach($errors->all() as $error)
        <script> notify('error', '{{ $error }}'); </script>
    @endforeach
    
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <script> notify('success', '{{ $msg }}'); </script>
        @endforeach
    @else
        <script> notify('success', '{{ $data }}'); </script>
    @endif
@endif

<!-- /Custom Notification -->

