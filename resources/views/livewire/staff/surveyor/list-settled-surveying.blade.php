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
          <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
              <img src="{{ asset('backend/dist/img/user.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="info text-center">
              <a href="" class="d-block">{{ auth('staff')->user()->name }} <br>
                  <span class="badge text-bg-info px-2">{{ auth('staff')->user()->role }} </span>
              </a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <h5 class="text-info ml-2">Navigations</h4>
              <li class="nav-item">
                <a href="{{route('staff.dashboard')}}" class="nav-link {{ request()->is('staff/dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              
              @if(\App\Helpers\RoleCheckHelper::isCustCare())
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                    Manage Users
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('staff.customers')}}" class="nav-link {{ request()->is('staff/customers') ? 'active' : '' }}">
                      <i class="fa fa-user"></i>
                      <p> Manage Customers</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('staff.lgo')}}" class="nav-link {{ request()->is('staff/lgo') ? 'active' : '' }}">
                      <i class="fa fa-building"></i>
                      <p> Manage LGO's</p>
                    </a>
                  </li>
                  @if(\App\Helpers\RoleCheckHelper::isAdmin())
                  <li class="nav-item">
                    <a href="{{route('staff.allstaffs')}}" class="nav-link {{ request()->is('staff/staffs') ? 'active' : '' }}">
                      <i class="fa fa-user-circle"></i>
                      <p> Manage Staffs</p>
                    </a>
                  </li>
                  @endif
                </ul>
              </li>
              @endif
              
              @if(\App\Helpers\RoleCheckHelper::isCustCare())
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-tint"></i>
                    <p>
                      Manage Requests
                      <i class="right fas fa-angle-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{route('custcare.allrequests')}}" class="nav-link {{ request()->is('staff/custcare/allrequests') ? 'active' : '' }}">
                              <i class="nav-icon fa fa-pause"></i>
                              <p>
                              Pending Requests
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('custcare.waitingforconnection')}}" class="nav-link {{ request()->is('staff/custcare/waitingforconnection') ? 'active' : '' }}">
                              <i class="nav-icon fa fa-hourglass-end"></i>
                              <p>
                              Waiting Connection
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('custcare.connectionfiles')}}" class="nav-link {{ request()->is('staff/custcare/connectionfiles') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-check-circle"></i>
                            <p>
                            Connection Complete
                            </p>
                        </a>
                      </li>
                  </ul>
                </li>
              @endif
    
            @if(\App\Helpers\RoleCheckHelper::isSurveyor())
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-list"></i>
                <p>
                  Manage Surveying
                  <i class="right fas fa-angle-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('surveyor.listtasks')}}" class="nav-link {{ request()->is('staff/surveyor/listtasks') ? 'active' : '' }}">
                      <i class="nav-icon fa fa-hourglass-end"></i>
                      <p>
                      Pending Surveying
                      </p>
                  </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('surveyor.listsettledtasks')}}" class="nav-link {{ request()->is('staff/surveyor/listsettledtasks') ? 'active' : '' }}">
                          <i class="nav-icon fa fa-tasks"></i>
                          <p>
                          Settled Surveying
                          </p>
                      </a>
                  </li>
              </ul>
          </li>
          @endif
    
          @if(\App\Helpers\RoleCheckHelper::isSurveyor())
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-file"></i>
            <p>
                Manage Invoices
                <i class="right fas fa-angle-right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('surveyor.requeststoinvoice')}}" class="nav-link {{ request()->is('staff/surveyor/requeststoinvoice') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>
                        Create Invoice
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('surveyor.allinvoices')}}" class="nav-link {{ request()->is('staff/surveyor/allinvoices') ? 'active' : '' }}">
                      <i class="nav-icon fa fa-object-group"></i>
                        <p>
                        All Invoices
                        </p>
                    </a>
                </li>
            </ul>
          </li>
          @endif
    
          @if(\App\Helpers\RoleCheckHelper::isEngineer())
          <li class="nav-item">
            <a href="{{ route('engineer.allinvoices')}}" class="nav-link {{ request()->is('staff/engineer/allinvoices') ? 'active' : '' }}">
              <i class="nav-icon fa fa-file"></i>
              <p>
               Invoices
              </p>
            </a>
          </li>
          @endif
    
          @if(\App\Helpers\RoleCheckHelper::isEngineer())
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Reports
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-sign-language "></i>
                        <p>
                            Surveyors Perfomances
                        </p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-compass"></i>
                      <p>
                        Location Analysis
                      </p>
                  </a>
                </li> --}}
                <li class="nav-item">
                  <a href="{{ route('reports.waitingforconnection')}}" class="nav-link {{ request()->is('staff/reports/waitingforconnection') ? 'active' : '' }}">
                      <i class="nav-icon fa fa-hourglass-end"></i>
                      <p>
                      Waiting Connection
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('reports.connectioncomplete')}}" class="nav-link {{ request()->is('staff/reports/connectioncomplete') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-check-circle"></i>
                    <p>
                    Connection Complete
                    </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('reports.requesttoconnection')}}" class="nav-link {{ request()->is('reports/requesttoconnection') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-rocket"></i>
                    <p>
                      Request to Connection
                    </p>
                </a>
            </li>
            </ul>
          </li>
          @endif
    
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
                <a href="javascript:void(0)" onclick="document.getElementById('logout').submit();" class="nav-link">
                  <i class="nav-icon fa fa-blind"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
    
              <form id="logout" action="{{ route('staff.logout') }}" method="POST">
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
                        <h4 class="m-0">Settled Surveying Areas</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('staff.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Settled Surveying</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

     <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">

            @if($connections->isEmpty())
            <div class="col-lg-6 col-6">
                <div class="card card-outline card-info">
                    <div class="card-header">
                    <h3 class="card-title"><b>No settled task at the moment!!</b></h3>

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
                @foreach($connections as $connection)
                <div class="col-lg-4 col-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                        <h3 class="card-title"><b>{{ $connection->fullName }}</b></h3>

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
                                    <b>Area:</b> <em class="float-right">{{ $connection->district }}, {{ $connection->ward }} - {{ $connection->street }}</em>
                                </li>

                                <li class="nav-item mt-2">
                                    <b> House #, Plot #:</b> <em class="float-right">{{ $connection->house }}, {{ $connection->plot }}</em>
                                </li>

                                <li class="nav-item mt-2">
                                    <b> Phone #: </b> <em class="float-right">{{ $connection->phone }}</em>
                                </li> 

                                <li class="nav-item mt-2">
                                    <b> Job Title:</b> <em class="float-right">{{ $connection->jobTitle }}</em>
                                </li>

                                <li class="nav-item mt-2">
                                    <b> Reason:</b> <em class="float-right">{{ $connection->connReason }}</em>
                                </li>

                                <li class="nav-item mt-2">
                                    <b> Service:</b> <em class="float-right">{{ $connection->servRequired }}</em>
                                </li>

                                <li class="nav-item mt-2">
                                    <b> Distance:</b> <em class="float-right">{{ $connection->distance }}m<sup>3</sup></em>
                                </li>

                                <li class="nav-item mt-2">
                                    <b> Coordinate X, Y:</b> <em class="float-right">{{ $connection->cordX }}, {{ $connection->cordY }}</em>
                                </li>

                                <li class="nav-item mt-2">
                                    <b> Survey Date:</b> <em class="float-right">{{ $connection->surveyorApprovedDate}}</em>
                                </li>

                                <li class="nav-item mt-2">
                                    <b> Surveyor Status:</b>
                                    @if($connection->surveyorStatus === 'Approved')
                                        <em class="float-right badge text-bg-info">Approved</em>
                                    @else
                                        <em class="float-right badge text-bg-danger">Rejected</em>
                                    @endif
                                </li>

                            </ul>

                            <hr>

                            <div class="text-center">
                                <a class="text-info rounded px-2 bg-success text-dark bg-opacity-10" href="{{ route('surveyor.viewrequests', $connection)}}"> <em><i class="nav-icon fa fa-edit"></i> Update Request Details</em> </a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- ./col -->
                @endforeach
           @endif

        </div>
    </div>
    </section>
    <!-- /.content -->

    </div>

</div>
