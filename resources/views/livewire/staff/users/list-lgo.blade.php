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
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
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
              <li class="nav-item">
                <a href="{{route('staff.allstaffs')}}" class="nav-link {{ request()->is('staff/staffs') ? 'active' : '' }}">
                  <i class="fa fa-user-circle"></i>
                  <p> Manage Staffs</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
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
                        <h1 class="m-0">Local government Offices</h1>
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
                    <div class="card-header">
                        <button wire:click.prevent="addNewLgoForm" style="border-radius: 20px" class="btn btn-primary"> <i class="nav-icon fa fa-plus-circle"></i> Add LGO</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
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
                            <td colspan="7" class="text-center">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <img style="width: 200px" src="{{ asset('backend/dist/img/notfound.png') }}" alt="">
                                    <span class="mt-2">Nothing to preview here!</span>
                                </div>
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
                      <label for="messenger">Messenger's Name</label>
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