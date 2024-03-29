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
                        <h4 class="m-0">Local Government Offices</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('staff.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Manage LGO's</li>
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
                <strong> <i class="fa fa-check-circle mr-1"></i>{{ session('message') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between ilign-items-center mb-2">
                        <div>
                          <button wire:click.prevent="addNewLgoForm" style="border-radius: 20px" class="btn btn-primary"> <i class="nav-icon fa fa-plus-circle"></i> Add LGO</button>
                        </div>
                        <div>
                          <input wire:model="searchTerm" type="text" class="form-control" placeholder="Search LGO">
                        </div>
                      </div>
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>District</th>
                          <th>Ward</th>
                          <th>street</th>
                          <th>Chairperson</th>
                          <th>Phone #</th>
                          <th>P.O BOX</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($lgos as $lgo)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lgo->district }}</td>
                            <td>{{ $lgo->ward }}</td>
                            <td>{{ $lgo->street }}</td>
                            <td>{{ $lgo->messenger }}</td>
                            <td>+{{ $lgo->phone }}</td>
                            <td>P.O BOX {{ $lgo->box }}</td>
                            <td>
                              <a wire:click.prevent="editLgo({{ $lgo }})" href="#"><i class="nav-icon fa fa-edit text-primary mr-2" title="edit"></i></a>
                              <a wire:click.prevent="lgoDeleteConfirmation({{ $lgo->id }})" href="#"><i class="nav-icon fa fa-trash text-danger" title="delete"></i></a>
                            </td>
                          </tr>
                        @empty
                          
                          <tr>
                            <td colspan="8" class="text-center">
                                No LGO found at the moment!
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
        <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'editLgoData' : 'addLgo' }}">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">
                    @if($showEditModal)
                      <span>Edit local Goverment Office</span>
                    @else
                      <span>Add local Goverment Office</span>
                    @endif
                  </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="card-body">
                    {{-- <div class="form-group">
                      <label for="district">District</label>
                      <input type="text" wire:model.defer="state.district" class="form-control @error('district') is-invalid @enderror" id="district" placeholder="Enter District Name">
                      @error('district')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div> --}}

                    <div class="form-group">
                      <label>Select District</label>
                      <select wire:model.defer="state.district" wire:change='getDistrict($event.target.value)' class="form-control select2 @error('district') is-invalid @enderror" style="width: 100%;">
                        <option value="" selected="selected">Choose District..</option>
                        <option value="Ilala">Ilala</option>
                        <option value="Kinondoni">Kinondoni</option>
                        <option value="Temeke">Temeke</option>
                        <option value="Ubungo">Ubungo</option>
                        <option value="Kigamboni">Kigamboni</option>
                      </select>
                      @error('district')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    @if (!empty($selectedDistrict))
                    <div class="form-group">
                      <label>Select Ward</label>
                      <select wire:model.defer="state.ward" class="form-control select2 @error('ward') is-invalid @enderror" style="width: 100%;">
                        <option value="" selected="selected">Choose Ward..</option>
                        @foreach ($kata as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                      </select>
                      @error('ward')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    @endif

                    <div class="form-group">
                      <label for="street">Street</label>
                      <input type="text" wire:model.defer="state.street" class="form-control @error('street') is-invalid @enderror" id="street" placeholder="Enter Street Name">
                      @error('street')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="messenger">Chairperson Name</label>
                      <input type="text" wire:model.defer="state.messenger" class="form-control @error('messenger') is-invalid @enderror" id="messenger" placeholder="Enter Messenger's Name">
                      @error('messenger')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="phone">Active Phone No</label>
                      <input type="text" wire:model.defer="state.phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Phone Number">
                      @error('phone')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="box">P.O BOX</label>
                      <input type="text" wire:model.defer="state.box" class="form-control @error('box') is-invalid @enderror" id="box" placeholder="Enter P.O BOX">
                      @error('box')
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