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
                          <h4 class="m-0">Manage Staffs</h4>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="{{ route('staff.dashboard')}}">Home</a></li>
                              <li class="breadcrumb-item active">Manage Staffs</li>
                          </ol>
                      </div><!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
        
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
  
              @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> <i class="fa fa-check-circle mr-2"></i>{{ session('message') }}</strong> 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if(session()->has('errorMessage'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong> <i class="fa fa-times-circle mr-2"></i>{{ session('errorMessage') }}</strong> 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between ilign-items-center mb-2">
                          <div>
                            <button wire:click.prevent="addNewStaffForm" style="border-radius: 20px" class="btn btn-primary"> <i class="nav-icon fa fa-plus-circle"></i> Add Staff</button>
                          </div>
                          <div>
                            <input wire:model="searchTerm" type="text" class="form-control" placeholder="Search staff">
                          </div>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Office</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          @forelse($staffs as $staff)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td> <img src="{{ asset('backend/dist/img/user.png') }}" alt="AdminLTE Logo" width="40" height="40" class="img-circle brand-image"></td>
                              <td>{{ $staff->name }}</td>
                              <td>{{ $staff->email }}</td>
                              <td>+{{ $staff->phone }}</td>
                              <td>{{ $staff->office }}</td>
                              <td class="text-center">
                                @if($staff->role == 'Admin')
                                <span class="badge text-bg-info px-2">{{ $staff->role }} </span>
                                @else
                                <span class="badge text-bg-secondary px-2">{{ $staff->role }} </span>
                                @endif
                              </td>
                              <td  class="text-center">
                                <a wire:click.prevent="editStaff({{ $staff }})" href="#"><i class="nav-icon fa fa-edit text-primary mr-2" title="edit"></i></a>
                                <a wire:click.prevent="staffDeleteConfirmation({{ $staff->id }})" href="#"><i class="nav-icon fa fa-trash text-danger" title="delete"></i></a>
                              </td>
                            </tr>
                          @empty
                            
                            <tr>
                              <td colspan="8" class="text-center">
                                  No staff found at the moment!
                              </td>
                            </tr>
  
                          @endforelse
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                </div>
            </div>
          </section>
          <!-- /.content -->
      </div>
  
      <!-- Modal -->
      <div class="modal fade" id="lgoForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
          <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'editStaffData' : 'addStaff' }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        @if($showEditModal)
                        <span><b> <i class="fa fa-user" aria-hidden="true"></i> Edit Staff</b></span>
                        @else
                        <span><b> <i class="fa fa-user" aria-hidden="true"></i> Add Staff</b></span>
                        @endif
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                      <div class="form-group">
                        <label>Staff Name</label>
                        <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Staff Name">
                        @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Staff Phone Number</label>
                        <input type="text" wire:model.defer="state.phone" class="form-control @error('phone') is-invalid @enderror" id="name" placeholder="Enter Staff Phone Number">
                        @error('phone')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Staff Email Address</label>
                        <input type="text" wire:model.defer="state.email" class="form-control @error('email') is-invalid @enderror" id="name" placeholder="Enter Staff EmailAddress">
                        @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Select Staff Office</label>
                        <select wire:model.defer="state.office" class="form-control select2 @error('office') is-invalid @enderror" style="width: 100%;">
                          <option value="" selected="selected">Choose Office..</option>
                          <option value="Ilala">Ilala</option>
                          <option value="Kinondoni">Kinondoni</option>
                          <option value="Temeke">Temeke</option>
                          <option value="Ubungo">Ubungo</option>
                          <option value="Kigamboni">Kigamboni</option>
                        </select>
                        @error('office')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
  

                      <div class="form-group">
                        <label>Staff Role</label>
                        <select wire:model.defer="state.role" class="form-control select2 @error('role') is-invalid @enderror" style="width: 100%;">
                            <option value="" selected="selected">Choose Role...</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Regional Manager</option>
                            <option value="Engineer">Engineer</option>
                            <option value="Surveyor">Surveyor</option>
                            <option value="Customer Care">Customer Care</option>
                          </select>
                        @error('role')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <!-- /.card-body -->
  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                        @if($showEditModal)
                        <span>Save Changes</span>
                        @else
                            <span>Save</span>
                        @endif
                    </button>
                </div>
            </div>
          </form>
        </div>
    </div>
    
</div>