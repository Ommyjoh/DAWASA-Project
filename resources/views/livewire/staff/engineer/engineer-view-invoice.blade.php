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
                                        <h6><b>Control Number:</b>
                                          @if(empty($uniqueControlNumbers))
                                            <em>None</em>
                                          @else
                                            {{$uniqueControlNumbers[0]}}
                                          @endif
                                        </h6>
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

                                <div class="card-body p-0 mt-4">
                                    <table class="table table-striped">
                                    <thead class="bg-success p-2 text-white bg-opacity-75">
                                        <tr>
                                            <th style="width: 20px">#</th>
                                            <th>DESCRIPTION</th>
                                            <th class="text-center">QTY</th>
                                            <th class="text-center">UNIT</th>
                                            <th class="text-center">RATE</th>
                                            <th class="text-center">AMOUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $invoice->description }}</td>
                                                <td class="text-center">{{ $invoice->qty }}</td>
                                                <td class="text-center">{{ $invoice->unit }}</td>
                                                <td class="text-end">{{number_format($invoice->amount/$invoice->qty)}}</td>
                                                <td class="text-end">{{ number_format($invoice->amount) }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td>Total Cost</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-end"></td>
                                            <td class="text-end">{{ number_format($totalAmount) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>18% VAT</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-end"></td>
                                            <td class="text-end">{{ number_format($vat) }}</td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>New Connection Fee</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-end"></td>
                                            <td class="text-end">{{ number_format($newConnectionFee) }}</td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>Meter Deposit Fee</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-end"></td>
                                            <td class="text-end">{{ number_format($meterDepositFee) }}</td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>Excavation and Backfilling</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-end"></td>
                                            <td class="text-end">{{ number_format($backfillingFee) }}</td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td><b>Grand Total</b></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-end"></td>
                                            <td class="text-end"><b>{{ number_format($grandTotal) }}/=</b></td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>

                                <div class="text-start mt-2">
                                  <div class="col-md-12">
                                      <p> <b>Prepared by: </b>{{auth('staff')->user()->name}}</p>
                                    </div>
                                </div>

                                {{-- <div class="text-start mt-2">
                                  <div class="col-md-12">
                                      <p> <b>Authorized by: </b>_____________________</p>
                                    </div>
                                </div> --}}

                                <div class="text-start mt-2">
                                  <div class="col-md-12">
                                      <p> <b>Coordinates: </b> {{$request->cordX}}, {{$request->cordY}} <b>Nearest Meter:</b> {{$request->distance}}m<sup>3 </p>
                                    </div>
                                </div>

                                <form wire:submit.prevent="saveChanges" autocomplete="off">
                                    @csrf

                                    <div class="row mt-4">
                                        <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label> Take Action<b class="text-red">*</b></label>
                                            <select wire:model.defer='state.status' wire:change='getAction($event.target.value)' class="form-control select2" style="width: 100%;">
                                                <option selected>Choose action..</option>
                                                <option value="Approved">Approve Invoice</option>
                                                <option value="Rejected">Reject Invoice</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                        </div>
                                        
                                        @if($action === 'Rejected')
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Reason for Invoice Rejection:<b class="text-red">*</b></label>
                                                    <textarea wire:model.defer='state.note' class="form-control rows="3" placeholder="Enter ..."></textarea>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                        @elseif($action === 'Approved')
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Approved by;</label>
                                                    <input class="form-control" value="{{ auth('staff')->user()->name }}" readonly>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                        @endif
                                    </div>

                                    <div class=" mt-4 mb-4">
                                        <div class="col-12 d-flex flex-row">
                                            <div class="col-md-6">
                                                <a href="{{ route('engineer.allinvoices')}}"><button type="button" class="btn btn-block btn-danger">Cancel</button></a>
                                              </div>
                                              <div class="col-md-6">
                                                <button type="submit" class="btn btn-block btn-success">Approve</button>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                    
                              <div class="text-center mt-4">
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

