<div>
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
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-thumbs-down"></i>
                  <p>
                    Manage Complaints
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-credit-card"></i>
                  <p>
                    Payments
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

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">My Site Surveyors</h5>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('customer.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Site Surveyors</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @if($surveyors->isEmpty())
                        <div class="col-lg-6 col-6">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                <h3 class="card-title"><b>No surveyor at the moment!</b></h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <b>-</b> <em class="float-right">-</em>
                                        </li>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- ./col -->
                    @else
                    @foreach($surveyors as $surveyor)
                        <div class="col-lg-4 col-6">
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username">Survey for House No: <b><em>{{$surveyor->house}}</em></b></h3>
                                <h5 class="widget-user-desc">{{$surveyor->street}} - {{$surveyor->ward}}</h5>
                                </div>
                                <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="{{ asset('backend/dist/img/user.png') }}" alt="User Avatar">
                                </div>
                                <div class="card-footer p-4">
                                <div class="row">
                                        <ul class="nav flex-column">

                                            <li class="nav-item mt-4">
                                                <b>Surveyor Name:</b> <em class="float-right">{{$surveyor->staff->name}}</em>
                                            </li>

                                            <li class="nav-item mt-2">
                                                <b> Office:</b> <em class="float-right">{{$surveyor->staff->role}}, {{$surveyor->staff->office}}</em>
                                            </li>

                                            <li class="nav-item mt-2">
                                                <b> Phone #:</b> <em class="float-right">{{$surveyor->staff->phone}}</em>
                                            </li>

                                            <li class="nav-item mt-2">
                                                <b> Email:</b> <em class="float-right">{{$surveyor->staff->email}}</em>
                                            </li>

                                            <li class="nav-item mt-2">
                                                <b> Days Remaining:</b>
                                               @if($surveyor->surveyorStatus === 'Pending')
                                                  @if($surveyor->remainingDays['remainingDays'])
                                                  <em class="float-right badge text-bg-info">{{ $surveyor->remainingDays['remainingDays'] }} days</em>
                                                  @else
                                                      <em class="float-right badge text-bg-danger">{{ $surveyor->remainingDays['daysPassed'] }} overdue days</em>
                                                  @endif
                                                @else
                                                  <em class="float-right badge text-bg-success"><i class="nav-icon fa fa-check-circle mr-2"></i>Site Surveyed</em>
                                               @endif
                                            </li>

                                </div>
                                <!-- /.row -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </section>

      </div>
</div>