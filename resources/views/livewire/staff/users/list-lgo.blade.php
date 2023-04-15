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
          <a href="" class="d-block">Emmanuel Boshe</a>
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
                <a href="#" class="nav-link">
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
                        <h1 class="m-0">All Customers</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('staff.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Manage Customers</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
      
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
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
                          <th>Date</th>
                          <th>Customer Name</th>
                          <th>street</th>
                          <th>Messenger</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>Trident</td>
                          <td>Internet
                            Explorer 4.0
                          </td>
                          <td>Win 95+</td>
                          <td> 4</td>
                          <td>X</td>
                        </tr>
                        <tr>
                          <td>Trident</td>
                          <td>Internet
                            Explorer 5.0
                          </td>
                          <td>Win 95+</td>
                          <td>5</td>
                          <td>C</td>
                        </tr>
                        <tr>
                          <td>Trident</td>
                          <td>Internet
                            Explorer 5.5
                          </td>
                          <td>Win 95+</td>
                          <td>5.5</td>
                          <td>A</td>
                        </tr>
                        <tr>
                          <td>Trident</td>
                          <td>Internet
                            Explorer 6
                          </td>
                          <td>Win 98+</td>
                          <td>6</td>
                          <td>A</td>
                        </tr>
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
    <div class="modal fade" id="lgoForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form autocomplete="off" wire:submit.prevent="addLgo">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add local Goverment Office</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="district">District</label>
                      <input type="text" wire:model.defer="state.district" class="form-control" id="district" placeholder="Enter District Name">
                    </div>
                    <div class="form-group">
                      <label for="street">Street</label>
                      <input type="text" wire:model.defer="state.street" class="form-control" id="street" placeholder="Enter Street Name">
                    </div>
                    <div class="form-group">
                      <label for="messenger">Messenger's Name</label>
                      <input type="text" wire:model.defer="state.messenger" class="form-control" id="messenger" placeholder="Enter Messenger's Name">
                    </div>
                    <div class="form-group">
                      <label for="phone">Active Phone No</label>
                      <input type="text" wire:model.defer="state.phone" class="form-control" id="phone" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                      <label for="box">P.O BOX</label>
                      <input type="text" wire:model.defer="state.box" class="form-control" id="box" placeholder="Enter P.O BOX">
                    </div>
                  </div>
                  <!-- /.card-body -->

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </div>
        </form>
      </div>
  </div>
  
</div>