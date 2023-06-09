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
                    <a href="#" class="nav-link">
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
                                    <h4><b><u>{{ $request->jobTitle }} Invoice</u></b>
                                    </h4>
                                </div>

                                <div class="d-flex justify-content-between my-2 px-4 ml-4 pl-4">
                                    <div class="col-12 col-md-4 pl-4">
                                        <h6><b>Invoice No:</b> 998876</h6>
                                    </div>
  
                                    <div class="col-12 col-md-4 pl-4">
                                        <h6><b>Control Number:</b> <em>None</em></h6>
                                    </div>

                                    <div class="col-12 col-md-4 pl-4">
                                        <h6><b>Date:</b> {{\Illuminate\Support\Carbon::now()->toDateString()}}</h6>
                                    </div>
  
                                </div>

                                <div class="d-flex justify-content-between my-2 px-4 ml-4">
                                    <div class="col-12 col-md-4 pl-4">
                                        <h6><b>Customer:</b> {{ $request->fullName }}</h6>
                                    </div>
                                    
                                    <div class="col-12 col-md-4 pl-4">
                                        <h6><b>Street:</b> {{ $request->street }}</h6>
                                    </div>
                                    
                                    <div class="col-12 col-md-4 pl-4">
                                        <h6><b>Phone:</b> {{ $request->phone }}</h6>
                                    </div>
  
                                </div>

                                <div class="d-flex justify-content-end align-items-end text-center mt-4">
                                    <div class="col-12 col-md-4">
                                        <button wire:click='addItem' class="btn btn-info rounded-pill">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row mt-2 px-4">
                                    @foreach ($items as $index => $item)
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <select wire:model="items.{{ $index }}.description" class="form-control select2" style="width: 100%;">
                                                    <option selected>Choose action..</option>
                                                    <option value="Approved">Approve Request</option>
                                                    <option value="Rejected">Reject Request</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>Unit</label>
                                                <select wire:model="items.{{ $index }}.unit" class="form-control select2" style="width: 100%;">
                                                    <option selected>Choose..</option>
                                                    <option value="PCS">PCS</option>
                                                    <option value="PC">PC</option>
                                                    <option value="FT">FT</option>
                                                    <option value="MITS">MITS</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>QTY</label>
                                                <input wire:model="items.{{ $index }}.qty" type="number" class="form-control select2" style="width: 100%;">
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>Rate</label>
                                                <input wire:model="items.{{ $index }}.rate" type="number" class="form-control select2" style="width: 100%;">
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input wire:model="items.{{ $index }}.amount" type="number" class="form-control select2" style="width: 100%;" readonly>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 col-md-1">
                                            <div class="form-group">
                                                <button wire:click="removeItem({{ $index }})" class="btn btn-danger rounded-pill">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                
                                  </div>
                                

                              <div class="text-center">
                                <div class="col-md-12">
                                  <p> <b>Reference: </b>DWS-NCF <b>Revision: </b>0  <b>Issue date: </b> {{ now()->format('M d, Y') }} <a href="https://www.dawasa.go.tz/en" target="_blank"> <em>{{Auth('staff')->user()->office}} branch, </em> DAWASA</a></p>
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
