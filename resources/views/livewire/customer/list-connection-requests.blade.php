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
                      <h5 class="m-0">All connection Requests</h5>
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
                  <div class="card-body">
                    <div class="mb-2">
                      <a href="{{ route('customer.createrequest')}}"><button style="border-radius: 20px" class="btn btn-primary"> <i class="nav-icon fa fa-plus-circle"></i> New Request</button></a>
                    </div>
                    <table class="table table-striped table-bordered">
                      <thead class="bg-secondary p-2 text-center text-white bg-opacity-75 text-info">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th colspan="2">Progress</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th class="text-start">Date</th>
                                <th class="text-start">Name</th>
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
                                    <td class="text-center"><span class="badge text-bg-info p-2">Submitted</span></td>
                                    <td  class="text-center">
                                        @if($request->lgoStatus == 'Pending')
                                            <span class="badge text-bg-warning p-2">Pending</span>
                                        @elseif($request->lgoStatus == 'Approved')
                                            <span class="badge text-bg-success p-2">Approved</span>
                                        @else
                                            <span class="badge text-bg-danger p-2">Rejected</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($request->dawasaStatus == 'Pending')
                                            <span class="badge text-bg-warning p-2">Pending</span>
                                        @elseif($request->dawasaStatus == 'Approved')
                                            <span class="badge text-bg-success p-2">Approved</span>
                                        @else
                                            <span class="badge text-bg-danger p-2">Rejected</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('customer.viewrequest', $request)}}"><i class="nav-icon fa fa-eye text-primary mr-2"></i></a>
                                        @if($request->dawasaStatus != 'Approved')
                                          <a wire:click.prevent="requestDeleteConfirmation({{ $request->id }})" href="#"><i class="nav-icon fa fa-trash text-danger mr-2" title="delete"></i></a>
                                        @endif
                                        @if($request->lgoNote != NULL | $request->dawasaNote != NULL )
                                          <a wire:click.prevent="showReasonModal({{ $request }})" href="#"><i class="nav-icon fa fa-info text-info" title="view"></i></a>
                                        @endif
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
        </div>
      </section>
      <!-- /.content -->
    </div>

    <div class="modal fade" id="lgoForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h3 class="modal-title fs-5 text-danger" id="exampleModalLabel">
                      <span><b> <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Reason for Request Rejection</b></span>
                  </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-center p-4">
                 <h6>{{ $note }}</h6>
              </div>
          </div>
      </div>
  </div>
  </div>