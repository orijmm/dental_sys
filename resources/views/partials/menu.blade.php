<!--Main Menu-->
<div class="responsive-admin-menu" id="sidebar-menu">
  <div class="responsive-menu">{{ settings::get('app_name') }}
    <div class="menuicon"><i class="fa fa-angle-down"></i></div>
  </div>
  <ul id="menu">
    <li>
      <a class="menu {{Request::is('home*') ?  'active' : '' }}" href="{{ route('home') }}" title="@lang('app.home')">
        <i class="fa fa-home"></i><span> @lang('app.home')</span>
      </a>
    </li>
    <li>
      <a class="menu" href="{{ route('appointment.index') }}" title="@lang('app.users')">
      <i class="fa fa-align-justify"></i><span> Citas Medicas</span>
      </a>
    </li>
    <li>
      <a class="menu" href="{{ route('history.index') }}" title="@lang('app.users')">
      <i class="fa fa-h-square"></i><span> Historias Dentales</span>
      </a>
    </li>
    <li>
      <a class="menu" href="{{ route('specialist.index') }}" title="@lang('app.users')">
      <i class="fa fa-user-md"></i><span> Especialistas</span>
      </a>
    </li>
    <li>
      <a class="menu" href="{{ route('user.index') }}" title="@lang('app.users')">
      <i class="fa fa-line-chart"></i><span> Reportes</span>
      </a>
    </li>
   @permission(('users.manage'))
    <li>
      <a class="menu {{ Request::is('user*') ? 'active' : ''  }}" href="{{ route('user.index') }}" title="@lang('app.users')">
      <i class="fa fa-users"></i><span> @lang('app.users')</span>
      </a>
    </li>
    @endpermission
    @permission(('users.activity'))
      <li>
        <a class="menu {{ Request::is('activity*') ? 'active' : ''  }}" href="{{ route('activity.index') }}" title="@lang('app.activity_log')">
        <i class="fa fa-bars"></i><span> @lang('app.activity_log')</span>
        </a>
      </li>
     @endpermission
    @permission(('roles.manage', 'permissions.manage'))     
      <li>
        <a class="submenu {{ Request::is('role*') || Request::is('permission*') ? 'active' : ''  }}" href="#" title="@lang('app.roles_and_permissions')" data-id="role-permission-sub"><i class="fa fa-lock"></i><span> @lang('app.roles_and_permissions')</span></a>
          <ul id="role-permission-sub" class="accordion">
          @permission(('roles.manage'))
            <li><a href="{{ route('role.index') }}" class="{{ Request::is('role*') ? 'active' : ''  }}" ><i class="fa fa-group"></i><span>@lang('app.roles')</span></a></li>
          @endpermission
          @permission(('permissions.manage'))
            <li><a href="{{ route('permission.index') }}" class="{{ Request::is('permission*') ? 'active' : ''  }}"><i class="fa fa-key"></i><span> @lang('app.permissions') </span></a></li>
           @endpermission
          </ul>
      </li>
     @endpermission
    @permission(('settings.general')) 
     <li>
      <a class="menu {{ Request::is('setting*') ? 'active' : ''  }}" href="{{ route('setting.administration') }}" title="@lang('app.setting')">
      <i class="fa fa-cogs"></i><span> @lang('app.setting')</span>
      </a>
    </li>
    @endpermission
  </ul>
<br>
<br>
<br>
<div id="logo-menu-lateral" class="text-center">
  <img src="{{asset('public/images/banner-dental-services.png')}}" class="rounded" alt="...">
</div>
</div>
<!--/MainMenu--> 