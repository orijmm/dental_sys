<!--Navigation-->
<nav class="main-header clearfix" role="navigation"> 
<a class="navbar-brand" href="{{route('home')}}"><span class="text-blue">{{ settings('app_name') }}</span></a> 
  <div class="navbar-content">   
    <!--Sidebar Toggler--> 
    <a href="#" class="btn btn-default left-toggler"><i class="fa fa-bars"></i></a> 
    <!--Right Userbar Toggler--> 
    <a href="#" class="btn btn-user right-toggler pull-right"><i class="entypo-vcard"></i> <span class="logged-as hidden-xs">@lang('app.Logged as')</span><span class="logged-as-name hidden-xs">{{ Auth::user()->full_name() }}</span></a>               
  </div>
</nav>
<!--/Navigation--> 
