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
                      <h5 class="m-0">All connection Requests</h5>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('staff.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Connection Requests</li>
                    </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
          <strong> <i class="fa fa-check-circle mr-1"></i>{{ session('success') }}</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="col-12">
                <div class="card-body">
                  <table class="table table-striped">
                      <thead class="bg-secondary p-2 text-center text-white bg-opacity-75 text-info">
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">Progress</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th class="text-start">Date</th>
                                <th class="text-start">Customer Name</th>
                                <th>Local Goverment</th>
                                <th>DAWASA</th>
                                <th>Surveyor</th>
                                <th>Survey Days</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($requests as $request)
                                <tr>
                                    <td>{{ $request->created_at }}</td>
                                    <td>{{ $request->fullName }}</td>
                                    <td class="text-center">
                                        @if($request->lgoStatus == 'Pending')
                                            <span class="badge text-bg-warning p-2"><em>Pending</em></span>
                                        @elseif($request->lgoStatus == 'Approved')
                                            <span class="badge text-bg-success p-2"><em>Approved</em></span>
                                        @else
                                            <span class="badge text-bg-danger p-2"><em>Rejected</em></span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($request->dawasaStatus == 'Pending')
                                            <span class="badge text-bg-warning p-2"><em>Pending</em></span>
                                        @elseif($request->dawasaStatus == 'Approved')
                                            <span class="badge text-bg-success p-2"><em>Approved</em></span>
                                        @else
                                            <span class="badge text-bg-danger p-2"><em>Rejected</em></span>
                                        @endif
                                    </td>
                                    
                                    <td class="text-center">
                                      @if($request->staff_id ==NULL)
                                      <span class="badge text-bg-secondary p-2"><em>Unassigned</em></span>
                                      @else
                                      {{$request->staff->name }}
                                      @endif
                                    </td>

                                    <td class="text-center">
                                      @if($request->dawasaStatus == 'Approved')
                                        @if($request->remainingDays['remainingDays'])
                                          <span class="badge text-bg-secondary p-2"><em>
                                            {{ $request->remainingDays['remainingDays'] }} days left
                                          </em></span>
                                        @else
                                          <span class="badge text-bg-danger p-2"><em>
                                            {{ $request->remainingDays['daysPassed'] }} overdue days
                                          </em></span>
                                        @endif
                                      @else
                                        <span class="badge text-bg-secondary p-2"><em>
                                          Not yet
                                        </em></span>
                                      @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('custcare.viewrequests', $request)}}"><i class="nav-icon fa fa-eye text-primary mr-2"></i></a>
                                    </td>
                                </tr>
                            @empty
                              <tr>
                                <td colspan="7" class="text-center p-4">
                                    No connection request found at the moment!
                                </td>
                              </tr>
                            @endforelse
                           
                          </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
            </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>