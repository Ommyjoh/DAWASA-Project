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
                <a href="{{route('custcare.allrequests')}}" class="nav-link {{ request()->is('staff/custcare/allrequests') ? 'active' : '' }}">
                  <i class="nav-icon fa fa-tint"></i>
                  <p>
                    Connection Requests
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('surveyor.listtasks')}}" class="nav-link {{ request()->is('staff/surveyor/listtasks') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-tasks"></i>
                    <p>
                    Surveyor Tasks
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

    <div class="content-wrapper p-2">
        <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
                  <div class="card">
                      <div class="card-body">
                            <div class="row">
                                <div class="d-flex justify-content-center align-items-center text-center">
                                    <img src="{{ asset('backend/dist/img/tz.JFIF') }}" alt="AdminLTE Logo" width="75" height="80" class="brand-image">
                                    <h4> <b> <br> DAWASA WATER SUPPLY AND SANITATION AUTHORITY <br><h5><b>ISO 9001:2015 CERTIFIED</b></h5></b> </h4>
                                    <img src="{{ asset('backend/dist/img/dawasa.png') }}" alt="AdminLTE Logo" width="120" height="80" class="brand-image">
                                </div>
                                <div class="text-center">
                                    <p>DAWASA building, Dunga/malanga Road, Mwananyamala Area <br>
                                        P.O BOX 1573, Dar es Salaam - Tanzania | Tel +255 22 2760006/+255 22 27600015 <br>
                                        Fax: <a href="call:+255 22 2762480">+255 22 2762480</a> | Email: <a href="Mailto:ceo@dawasa.go.tz">ceo@dawasa.go.tz</a> | Website: <a href="https://www.dawasa.go.tz/en" target="_blank">www.dawasa.go.tz</a> <br>
                                        Info@dawasa.co.tz / 0800110064 / *150*00# (Bure)
                                    </p>
                                </div>
                                <div class="text-center text-success">
                                    <h4><b><u>SITE SURVEYING REPORT</u></b>
                                    </h4>
                                </div>
    
                                <div class="row mt-4 px-4">
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Customer Full Name:</label>
                                      <input style="width: 100%;" type="text" class="form-control" value="{{ $request->fullName }}" disabled>
                                    </div>
                                    <!-- /.form-group -->
                                  </div>

                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Customer Phone Number:</label>
                                      <input style="width: 100%;" type="text" class="form-control" value="+{{ $request->phone}}" disabled>
                                    </div>
                                    <!-- /.form-group -->
                                  </div>

                                </div>

                                <div class="row mt-4 px-4">
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Customer District:</label>
                                      <input style="width: 100%;" type="text" class="form-control" value="{{ $request->district }}" disabled>
                                    </div>
                                    <!-- /.form-group -->
                                  </div>

                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Customer Ward and Street:</label>
                                      <input style="width: 100%;" type="text" class="form-control" value="{{ $request->ward}} - {{ $request->street}}" disabled>
                                    </div>
                                    <!-- /.form-group -->
                                  </div>

                                </div>

                                <div class="row mt-4 px-4">
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Connection reason:</label>
                                      <input style="width: 100%;" type="text" class="form-control" value="{{ $request->connReason }}" disabled>
                                    </div>
                                    <!-- /.form-group -->
                                  </div>

                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Service Required:</label>
                                      <input style="width: 100%;" type="text" class="form-control" value="{{ $request->servRequired }}" disabled>
                                    </div>
                                    <!-- /.form-group -->
                                  </div>

                                </div>

                                <div class="text-center text-success mt-4">
                                  <h5> <b>Take action after survey </b> </h5>
                                </div>

                                <form wire:submit.prevent="saveChanges" autocomplete="off">
                                  @csrf

                                  <div class="row mb-4">
                                    <div class="col-12 col-md-6">
                                      <div class="form-group">
                                        <label> Action<b class="text-red">*</b></label>
                                        <select wire:model.defer='state.action' wire:change='getAction($event.target.value)' class="form-control select2 @error('state.action') is-invalid @enderror" style="width: 100%;">
                                          <option selected>Choose action..</option>
                                          <option value="Approved">Approve Request</option>
                                          <option value="Rejected">Reject Request</option>
                                        </select>
                                        @error('state.action')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                      </div>
                                      <!-- /.form-group -->
                                    </div>
                                    
                                    @if($action === 'Rejected')
                                      <div class="col-12 col-md-6">
                                        <div class="form-group">
                                          <label>Reason for request rejection:<b class="text-red">*</b></label>
                                          <textarea wire:model.defer='state.reason' class="form-control @error('state.reason') is-invalid @enderror" rows="3" placeholder="Fill remarks ..."></textarea>
                                          @error('state.reason')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                          @enderror
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    @endif
                                  </div>


                                  @if($action === 'Approved')
                                      <div class="text-center text-success mt-4">
                                        <h5> <b>Please complete this form </b> </h5>
                                      </div>

                                      <div class="row">
                                        <div class="col-12 col-md-6">
                                          <div class="form-group">
                                            <label>Job Title <b class="text-red">*</b></label>
                                            <select wire:model.defer='state.title' class="form-control select2 @error('state.title') is-invalid @enderror" style="width: 100%;">
                                              <option selected="selected">Choose job title...</option>
                                              <option value="New Connection">New Connection</option>
                                              <option value="Meter Change">Meter Change</option>
                                            </select>
                                            @error('state.title')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                            @enderror
                                          </div>
                                        </div>
                                        <!-- /.form-group -->
            
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                              <label>Distance from main: <b class="text-red">*</b></label>
                                              <input wire:model.defer='state.distance' style="width: 100%;" type="text" class="form-control @error('state.distance') is-invalid @enderror" placeholder="Enter distance">
                                              @error('state.distance')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-12 col-md-6">
                                          <div class="form-group">
                                            <label>Coordinate X: <b class="text-red">*</b></label>
                                            <input wire:model.defer='state.x' style="width: 100%;" type="text" class="form-control @error('state.x') is-invalid @enderror" placeholder="Enter coordinate X">
                                            @error('state.x')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                            @enderror
                                          </div>
                                        </div>
                                        <!-- /.form-group -->
            
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                              <label>Coordinate Y: <b class="text-red">*</b></label>
                                              <input wire:model.defer='state.y' style="width: 100%;" type="text" class="form-control @error('state.y') is-invalid @enderror" placeholder="Enter coordinate Y">
                                              @error('state.y')
                                              <div class="invalid-feedback">
                                                {{ $message }}
                                              </div>
                                              @enderror
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                      </div>

                                      <div class="row mb-4">
                                        <div class="col-12 col-md-6">
                                          <div class="form-group">
                                            <label>Survey date:</label>
                                            <input style="width: 100%;" type="text" class="form-control" value="{{ now()->format('M d, Y') }}" disabled>
                                          </div>
                                        </div>
                                        <!-- /.form-group -->
            
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                              <label>Approving surveyor:</label>
                                              <input style="width: 100%;" type="text" class="form-control" value="{{auth('staff')->user()->name}}" disabled>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                      </div>

                                  @endif

                                  <div class=" mb-4">
                                    <div class="col-12 d-flex flex-row">
                                      <div class="col-md-6">
                                        <a href="{{ route('surveyor.listtasks')}}"><button type="button" class="btn btn-block btn-danger">Cancel Report</button></a>
                                      </div>
                                      <div class="col-md-6">
                                          <button type="submit" class="btn btn-block btn-success">Submit Report</button>
                                      </div>
                                    </div>
                                  </div>
                                </form>

                              <div class="text-center">
                                <div class="col-md-12">
                                  <p> <b>Reference: </b>DWS-NCF <b>Revision: </b>0  <b>Issue date: </b> {{ now()->format('M d, Y') }} <a href="https://www.dawasa.go.tz/en" target="_blank">DAWASA</a></p>
                                </div>
                              </div>
                                  
                      <!-- /.card-body -->
                      </div>
                  </div>
    
                </div>
              </form>
          </section>
          <!-- /.content -->
    </div>
</div>
