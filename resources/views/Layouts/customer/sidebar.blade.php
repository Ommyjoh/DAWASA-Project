<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('backend/dist/img/AdminLTELogo.jpeg') }}" alt="AdminLTE Logo" class="brand-image elevation-3">
      <span class="brand-text font-weight-light"><b>DAWASA SERVICES</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <h5 class="text-info ml-2">Navigations</h4>
          <li class="nav-item">
            <a href="{{route('customer.dashboard')}}" class="nav-link {{ request()->is('customer/dashboard') ? 'active' : '' }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('customer.listrequests')}}" class="nav-link {{ request()->is('customer/listrequests') ? 'active' : '' }}" class="nav-link" class="nav-link">
              <i class="nav-icon fa fa-tint"></i>
              <p>
                Connection Requests
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('customer.surveyors')}}" class="nav-link {{ request()->is('customer/listsurveyors') ? 'active' : '' }}" class="nav-link" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Site Surveyors
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('customer.invoices')}}" class="nav-link {{ request()->is('customer/invoices') ? 'active' : '' }}">
              <i class="nav-icon fa fa-file"></i>
              <p>
               Invoices
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('customer.connectedrequests')}}" class="nav-link {{ request()->is('customer/connectedrequests') ? 'active' : '' }}">
              <i class="nav-icon fa fa-thumbs-up"></i>
              <p>
                Connected Requests
              </p>
            </a>
          </li>


          <h5 class="text-info mt-4 pt-4 ml-2">User Account</h5>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Profile Setting
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-blind"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>