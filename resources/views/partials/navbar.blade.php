<!--Navigation-->
<nav class="main-header clearfix" role="navigation"> 
<a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('public/images/logo_casab.png')}}" width="300px"></a> 
   <div id="navbar_textoylogo">
   <h1 class="text-white text-center colossal"><br>
   </h1>
   <h1 class="text-white text-center colossal">CLINICA DENTAL</h1>
   <div class="h2 text-center">SALUD ODONTOLOGICA PARA TODA LA FAMILIA</div>
   </div>
  <div class="navbar-content">   
    <!--Sidebar Toggler--> 
    <a href="#" class="btn btn-default left-toggler"><i class="fa fa-bars"></i></a> 
    <!--Right Userbar Toggler--> 
    <a href="#" class="btn btn-user right-toggler pull-right"><i class="entypo-vcard"></i> <span class="logged-as hidden-xs">@lang('app.Logged as')</span><span class="logged-as-name hidden-xs">{{ Auth::user()->full_name() }}</span></a>               
  </div>
</nav>
<!--/Navigation--> 
