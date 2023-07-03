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

    <div class="content-wrapper p-2">
        <section class="content">
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
    
                        <div class="mb-4 text-center text-uppercase">
                            <h4><b class="text-success">UPDATE CONNECTION DETAILS</b></h4>
                        </div>
    
                        <form wire:submit.prevent="saveChanges" autocomplete="off">
                            @csrf
                            <div class="row mb-2 mx-2">
                                <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>METER SIZE</label>
                                    <input wire:model.defer='state.meterSize' style="width: 100%;" type="text" class="form-control">
                                </div>
                                </div>
                                <!-- /.form-group -->
        
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                    <label>METER NUMBER</label>
                                    <input wire:model.defer='state.meterNumber' style="width: 100%;" type="text" class="form-control">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>
        
                            <div class="row mb-2 mx-2">
                                <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>INITIAL READING</label>
                                    <input wire:model.defer='state.initialReading' style="width: 100%;" type="text" class="form-control">
                                </div>
                                </div>
                                <!-- /.form-group -->
        
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                    <label>WORK DONE BY</label>
                                    <input wire:model.defer='state.plumber' style="width: 100%;" type="text" class="form-control">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>
        
                            <div class="row mb-2 mx-2">
                                <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>DAYS TO COMPLETE</label>
                                    <input wire:model.defer='state.daysComplete' style="width: 100%;" type="text" class="form-control">
                                </div>
                                </div>
                                <!-- /.form-group -->
        
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                    <label>AUTHORIZED BY</label>
                                    <input wire:model.defer='state.Authorizer' style="width: 100%;" type="text" class="form-control">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
        
                            </div>
        
                            <div class="col-12 px-2">
                                <div class="form-group mx-2 px-2">
                                <label>REMARKS</label>
                                <textarea wire:model.defer='state.remarks' class="form-control rows="6"></textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="my-4">
                                <button type="submit" class="btn btn-block btn-success">Update Customer File</button>
                            </div>
                        </form>
    
    
                        <div class="text-center mt-4">
                        <div class="col-md-12">
                            <p> <b>Reference: </b>DWS-JHF <b>Revision: </b>0  <b>Date: </b> {{ now()->format('M d, Y') }} <a href="https://www.dawasa.go.tz/en" target="_blank"> DAWASA</a></p>
                        </div>
                        </div>
                        
                <!-- /.card-body -->
                  </div>
                </div>
    
            </div>
        </section>
    </div>
</div>
