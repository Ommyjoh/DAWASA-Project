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
                                <i class="nav-icon fa fa-globe"></i>
                                <p>
                                All Requests
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-hourglass-end"></i>
                                <p>
                                Waiting Connection
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

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
                      <a href="{{route('surveyor.allinvoices')}}" class="nav-link">
                        <i class="nav-icon fa fa-object-group"></i>
                          <p>
                          All Invoices
                          </p>
                      </a>
                  </li>
              </ul>
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
                      <h5 class="m-0">All Invoices</h5>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('staff.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">All invoices</li>
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
                            <tr>
                                <th>Date</th>
                                <th>Invoice #</th>
                                <th>Customer Name</th>
                                <th>Job Title</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Engineer Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                          <tbody>
                            @forelse($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->created_date }}</td>
                                    <td>12658797</td>
                                    <td>{{ $invoice->fullName }}</td>
                                    <td>{{ $invoice->jobTitle }}</td>
                                    <td>{{ number_format(($invoice->total_amount -($invoice->total_amount * 0.18)) + 50000 + 26000 +2000) }}/=</td>
                                    <td><em class="float-center badge text-bg-danger">{{ $invoice->paymentStatus }}</em></td>
                                    <td>
                                      @if($invoice->engineerStatus === 'Pending')
                                        <em class="float-center badge text-bg-warning">{{ $invoice->engineerStatus }}</em>
                                      @elseif($invoice->engineerStatus === 'Approved')
                                        <em class="float-center badge text-bg-success">{{ $invoice->engineerStatus }}</em>
                                      @elseif($invoice->engineerStatus === 'Rejected')
                                        <em class="float-center badge text-bg-danger">{{ $invoice->engineerStatus }}</em>
                                      @else
                                        <em class="float-center badge text-bg-warning">"Pending"</em>
                                      @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('surveyor.surveyorviewinvoice', $invoice->connection_requests_id)}}"><i class="nav-icon fa fa-eye text-primary mr-2"></i></a>
                                        @if($invoice->engineerStatus === 'Rejected')
                                          <a href="#"><i class="nav-icon fa fa-info text-info mr-2"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                              <tr>
                                <td colspan="7" class="text-center p-4">
                                    No invoice found at the moment!
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