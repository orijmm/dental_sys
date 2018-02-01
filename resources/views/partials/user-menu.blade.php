 <!-- /Offcanvas user menu-->
      <aside class="user-menu"> 
        
        <!-- Tabs -->
        <div class="tabs-offcanvas">

          <div class="tab-content"> 
            
            <!--User Primary Panel-->
            <div class="tab-pane active" id="userbar-one">
              <div class="main-info">
                <div class="user-img"><img src="{{ Auth::user()->avatar() }}" alt="User Picture" /></div>
                <h1>{{ Auth::user()->full_name() }}</h1>
              </div>
              <div class="list-group"> 
                <a href="{{ route('profile.index')}}" class="list-group-item"><i class="fa fa-user"></i>@lang('app.profile')</a>
                <a href="{{ route('user.setting') }}" class="list-group-item"><i class="fa fa-cog"></i>@lang('app.setting')</a>
                <a href="{{ route('user.password') }}" class="list-group-item"><i class="fa fa-key"></i>@lang('app.auth_and_registration')</a>
                <div class="empthy"></div>
                <a data-toggle="modal" href="#" data-url="{{ route('auth.logout') }}" class="list-group-item goaway"><i class="fa fa-power-off"></i> @lang('app.sign_out')</a> 
              </div>
            </div>
            
          </div>
        </div>
        
        <!-- /tabs --> 
        
      </aside>
      <!-- /Offcanvas user menu--> 