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
              <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
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
                <a href="{{route('customer.dashboard')}}" class="nav-link {{ request()->is('customer/dashboard') ? 'active' : '' }}" class="nav-link" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{route('customer.listrequests')}}" class="nav-link {{ request()->is('customer/listrequests') ? 'active' : '' }}" class="nav-link" class="nav-link" class="nav-link">
                  <i class="nav-icon fa fa-tint"></i>
                  <p>
                    Connection Requests
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
                <div class="card-header">
                    <a href="{{ route('customer.createrequest')}}"><button style="border-radius: 20px" class="btn btn-primary"> <i class="nav-icon fa fa-plus-circle"></i> New Request</button></a>
                </div>
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover text-center">
                        <thead class="text-info text-center">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th colspan="2">Progress</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Local Goverment</th>
                                <th>DAWASA</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($requests as $request)
                                <tr>
                                    <td>{{ $request->created_at }}</td>
                                    <td>{{ $request->fullName }}</td>
                                    <td><span class="badge text-bg-info p-2">Submitted</span></td>
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
                                        @if($request->dawasaStatus == 'Pending')
                                            <span class="badge text-bg-warning p-2">Pending</span>
                                        @elseif($request->dawasaStatus == 'Approved')
                                            <span class="badge text-bg-success p-2">Approved</span>
                                        @else
                                            <span class="badge text-bg-danger p-2">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('customer.viewrequest', $request)}}"><i class="nav-icon fa fa-eye text-primary mr-2"></i></a>
                                        @if($request->lgoStatus != 'Approved')
                                          <a href="#"><i class="nav-icon fa fa-trash text-danger" title="delete"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
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