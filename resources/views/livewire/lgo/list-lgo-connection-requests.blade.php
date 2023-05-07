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
              <img src="{{ asset('backend/dist/img/tz.jfif') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="" class="d-block">{{ auth('lgos')->user()->street }}</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <h5 class="text-info ml-2">Navigations</h4>
              <li class="nav-item">
                <a href="{{route('lgo.dashboard')}}" class="nav-link {{ request()->is('lgo/dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{route('lgo.listrequests')}}" class="nav-link {{ request()->is('lgo/listrequests') ? 'active' : '' }}">
                  <i class="nav-icon fa fa-tint"></i>
                  <p>
                    Connection Requests
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
                <a href="javascript:void(0)" onclick="document.getElementById('logout').submit();" class="nav-link">
                  <i class="nav-icon fa fa-blind"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
    
              <form id="logout" action="{{ route('lgo.logout') }}" method="POST">
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
                      <h1 class="m-0">All connection Requests</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="{{ route('customer.dashboard')}}">Home</a></li>
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
              <div class="card">
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover text-center">
                        <thead class="text-info text-center">
                            <th>Date</th>
                            <th>Customer Name</th>
                            <th>Street</th>
                            <th>House</th>
                            <th>Trunk</th>
                            <th>Messenger Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                          <tbody>
                            @forelse($requests as $request)
                                <tr>
                                    <td>{{ $request->created_at }}
                                        @if($request->created_at == now()->format('M d, Y'))
                                        <img src="{{ asset('backend/dist/img/new.GIF') }}" alt="AdminLTE Logo" width="30" height="20" class="brand-image">
                                        @endif
                                    </td>
                                    <td>{{ $request->fullName }}</td>
                                    <td>{{ $request->street }}</td>
                                    <td>{{ $request->house }}</td>
                                    <td>{{ $request->plot }}</td>
                                    <td>{{ $request->mjumbe }}</td>
                                    <td>
                                      @if($request->lgoStatus == 'Pending')
                                          <span class="badge text-bg-warning p-2">Pending</span>
                                      @elseif($request->lgoStatus == 'Approved')
                                          <span class="badge text-bg-success p-2">Approved</span>
                                      @else
                                          <span class="badge text-bg-danger p-2">Rejected</span>
                                      @endif
                                  </td>
                                    <td>
                                        <a href="{{ route('lgo.viewrequest', $request) }}"><i class="nav-icon fa fa-eye text-primary mr-2" title="view"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <img style="width: 200px" src="{{ asset('backend/dist/img/notfound.png') }}" alt="">
                                            <span class="mt-2">No connection request!</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                           
                          </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
            </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>