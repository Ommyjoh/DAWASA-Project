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

    <div class="content-wrapper">

         <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">Completed Connections</h5>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('customer.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Connections Complete</li>
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
                <div >
                    <div class="card-body">
                      <table class="table table-striped table-bordered">
                          <thead class="bg-secondary p-2 text-white bg-opacity-75 text-info">
                              <tr>
                                  <th>#</th>
                                  <th>Customer Name</th>
                                  <th class="text-center">Meter No</th>
                                  <th class="text-center">Initial Reading</th>
                                  <th>Plumber</th>
                                  <th>Authorized</th>
                                  <th class="text-center">Connection Days</th>
                                  <th class="text-center">Action</th>
                              </tr>
                          </thead>
                            <tbody>
                              @forelse($connectionRequests as $connectionRequest)
                                 <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{$connectionRequest->fullName}}</td>
                                      <td class="text-center">{{$connectionRequest->meterNo}}</td>
                                      <td class="text-center">{{$connectionRequest->initialReading}}m <sup>3</sup></td>
                                      <td>{{$connectionRequest->plumber}}</td>
                                      <td>{{$connectionRequest->Authorizer}}</td>
                                      <td class="text-center">
                                          @if($connectionRequest->connDays > 7)
                                              <em class="float-center badge text-bg-danger">{{ $connectionRequest->connDays }} days</em>
                                          @else
                                              <em class="float-center badge text-bg-success">{{ $connectionRequest->connDays }} days</em>
                                          @endif
                                      </td>
                                      <td class="text-center">
                                          <a href="#"><i class="nav-icon fa fa-download text-primary mr-2"></i></a>
                                      </td>
                                 </tr>
                              @empty
                                <tr>
                                  <td colspan="8" class="text-center p-4">
                                      No connection made at this moment!
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
