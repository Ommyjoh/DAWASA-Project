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
                            <i class="nav-icon fa fa-globe"></i>
                            <p>
                            Pending Requests
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('custcare.waitingforconnection')}}" class="nav-link">
                            <i class="nav-icon fa fa-hourglass-end"></i>
                            <p>
                            Waiting Connection
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('custcare.connectionfiles')}}" class="nav-link">
                          <i class="nav-icon fa fa-hourglass-end"></i>
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
                    <a href="{{route('surveyor.allinvoices')}}" class="nav-link">
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
            <a href="{{ route('engineer.allinvoices')}}" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
               Invoices
              </p>
            </a>
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
    
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-success text-lg">
                      Approved
                    </div>
                </div>
                <div class="card-body">

                    <div class="mb-4 text-center text-uppercase">
                        <h2><b>HALMASHAURI YA MANISPAA YA {{ $request->district }}</b></h1>
                    </div>

                    <div class="mt-4 d-flex justify-content-between align-items-center text-center">
                        <div>
                            <h5>
                                <b>
                                    {{-- Simu: {{auth('lgos')->user()->phone}} --}}
                                    Simu: 255717810599
                                </b>
                            </h5>
                        </div>
                        @if($request->district == 'Ubungo')
                            <img src="{{ asset('backend/dist/img/ubungo.jpg') }}" alt="AdminLTE Logo" style= "width: 2in; height: 2.5in" class="brand-image">
                        @elseif($request->district == 'Ilala')
                            <img src="{{ asset('backend/dist/img/ilala.jpg') }}" alt="AdminLTE Logo" style= "width: 2in; height: 2.5in" class="brand-image">
                        @elseif($request->district == 'Kigamboni')
                            <img src="{{ asset('backend/dist/img/kigamboni.png') }}" alt="AdminLTE Logo" style= "width: 2in; height: 2.5in" class="brand-image">
                        @elseif($request->district == 'Temeke')
                            <img src="{{ asset('backend/dist/img/temeke.jpg') }}" alt="AdminLTE Logo" style= "width: 2in; height: 2.5in" class="brand-image">
                        @else
                            <img src="{{ asset('backend/dist/img/kinondoni.png') }}" alt="AdminLTE Logo" style= "width: 2in; height: 2.5in" class="brand-image">
                        @endif

                        <h5 class="text-start text-uppercase">
                           <b>
                            OFISI YA SERIKALI YA <br>
                            MTAA WA {{$request->street}} <br>
                            KATA YA {{$request->ward}} <br>
                            S.L.P 9090, <br>
                            DAR ES SALAAM
                           </b>
                        </h5>
                    </div>

                    <div class="p-4 d-flex justify-content-between align-items-center">
                        <div class="text-start text-uppercase">
                            <h5>
                                <b>
                                    NDG/MPK/ <br>
                                    MENEJA WA DAWASA <br>
                                    {{$request->district}}
                                </b>
                            </h5>
                        </div>
                        <img src="{{ Storage::url('passports/' .$request->passport) }}" style="width: 2in; height: 2in" alt="AdminLTE Logo" class="brand-image">
                    </div>

                    <div class="text-center">
                        <h4><b>YAH: UTAMBULISHO WA MKAZI WA MTAA</b></h4>
                        <hr>
                    </div>

                    <div class="p-4">
                        <p>
                            Napenda Kuamtambulisha ndugu <b>{{ $request->fullName }}</b> ambaye ni mkazi katika mtaa wangu wa <b>{{$request->street}}</b>
                            katika nyumba namba <b>{{$request->house}}</b> iliypopo chini ya kiongozi wa shina namba <b>{{$request->plot}}</b>
                            chini ya mjumbe wake <b>{{$request->mjumbe}}</b>, aliyehakiki makazi ya muhusika tajwa kuwa sahihi.
                        </p>
                    </div>

                    <div class="p-4">
                        <p>
                            Anwani ya makazi ya muhusika -----------------------<b>P.O BOX </b> <br>
                            Namba ya simu ya muhusika --------------------------<b>{{$request->phone}}</b> <br>
                            Kazi/shughuli ya muhusika ----------------------------<b>{{ $request->occupation }}</b> <br>
                            Taifa la muhusika ----------------------------------------<b>{{ $request->nationality }}</b> <br>
                            Sababu ya kufungiwa maji -----------------------------<b>{{ $request->connReason }}</b> <br>
                            Huduma inayohitajika ----------------------------------<b>{{ $request->servRequired }}</b> <br>
                        </p>
                    </div>

                      <hr class="mt-4">

                      <div class="text-center">
                        <div class="col-md-12">
                          <p> <b>Tarehe: </b> {{ now()->format('M d, Y') }} <a href="https://www.dawasa.go.tz/en" target="_blank">DAWASA</a></p>
                        </div>
                      </div>
                              
                  <!-- /.card-body -->
                  </div>
            </div>

            

            </div>

          <div class="card">
            <div class="ribbon-wrapper ribbon-xl">
                <div class="ribbon bg-success text-lg">
                  Approved
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4 text-center text-uppercase">
                    <h5><b>Barua ya utambulisho wa mkazi kutoka kwa mjumbe wa nyumba kumi(10)</b></h1>
                </div>

                <div class="d-flex justify-content-center">
                  <img src="{{ Storage::url('idLetters/' .$request->idLetter) }}" style="max-width: 100%; height: auto;" alt="AdminLTE Logo" class="brand-image">
                </div>

                <hr>

                <div class="mt-4 text-center text-uppercase">
                    <h5><b>Kitambulisho cha muhusika</b></h1>
                </div>

                <div class="d-flex justify-content-center">
                    <img src="{{ Storage::url('cards/' .$request->idCard) }}" style="max-width: 100%; height: auto;" alt="AdminLTE Logo" class="brand-image">
                </div>

            </div>
        </div>

        <div class="card">
            <div class="ribbon-wrapper ribbon-xl">
                <div class="ribbon bg-success text-lg">
                  Payment Approved
                </div>
            </div>
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
                        <p> <b>Coordinates: </b> {{$request->cordX}}, {{$request->cordY}} <b>Nearest Meter:</b> {{$request->distance}}m<sup>3 </p>
                      </div>
                  </div>

                <div class="text-center mt-4">
                  <div class="col-md-12">
                    <p> <b>Reference: </b>DWS-NCF <b>Revision: </b>0  <b>Date: </b> {{ now()->format('M d, Y') }} <a href="https://www.dawasa.go.tz/en" target="_blank"> DAWASA</a></p>
                  </div>
                </div>
                    
            <!-- /.card-body -->
              </div>
            </div>

        </div>

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
                        <h5><b>JOB CARD FOR NEW CONNECTION AT CUSTOMER SERVICE DEPARTMENT</b></h1>
                    </div>

                    <div class="row mb-2 px-4">
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                            <label>REGION</label>
                            <input style="width: 100%;" type="text" class="form-control" value="{{ $request->district }}" disabled>
                          </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                              <label>REQUEST DATE</label>
                              <input style="width: 100%;" type="text" class="form-control" value="{{ $request->created_at }}" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>

                    <div class="row mb-2 px-4">
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                            <label>CUSTOMER NAME</label>
                            <input style="width: 100%;" type="text" class="form-control" value="{{ $request->fullName }}" disabled>
                          </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                              <label>LOCATION</label>
                              <input style="width: 100%;" type="text" class="form-control" value="{{ $request->ward }} - {{ $request->street }}" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>

                    <div class="row px-4">
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                            <label>CUSTOMER CATEGORY</label>
                            <input style="width: 100%;" type="text" class="form-control" value="{{ $request->connReason }}" disabled>
                          </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                              <label>JOB TITLE</label>
                              <input style="width: 100%;" type="text" class="form-control" value="{{ $request->servRequired }}" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>

                    <div class="row mb-2 px-4">
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                            <label>JOB DONE BY</label>
                            <input style="width: 100%;" type="text" class="form-control" value="{{ $request->plumber }}"  disabled>
                          </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                              <label>AUTHORIZED BY</label>
                              <input style="width: 100%;" type="text" class="form-control" value="{{ $request->Authorizer }}" disabled>
                            </div>
                          </div>
                          <!-- /.form-group -->

                    </div>

                    <div class="text-center mt-4">
                    <div class="col-md-12">
                        <p> <b>Reference: </b>DWS-JC <b>Revision: </b>0  <b>Date: </b> {{ now()->format('M d, Y') }} <a href="https://www.dawasa.go.tz/en" target="_blank"> DAWASA</a></p>
                    </div>
                    </div>
                    
            <!-- /.card-body -->
              </div>
            </div>

        </div>

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
                        <h2><b>JOB HAND OVER</b></h2>
                    </div>

                    <div class="row mb-2 px-4">
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                            <label>REGION</label>
                            <input style="width: 100%;" type="text" class="form-control" value="{{ $request->district }}" disabled>
                          </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                              <label>REQUEST DATE</label>
                              <input style="width: 100%;" type="text" class="form-control" value="{{ $request->created_at }}" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>

                    <div class="row mb-2 px-4">
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                            <label>CUSTOMER NAME</label>
                            <input style="width: 100%;" type="text" class="form-control" value="{{ $request->fullName }}" disabled>
                          </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                              <label>LOCATION</label>
                              <input style="width: 100%;" type="text" class="form-control" value="{{ $request->ward }} - {{ $request->street }}" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>

                    <div class="row px-4">
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                            <label>CUSTOMER CATEGORY</label>
                            <input style="width: 100%;" type="text" class="form-control" value="{{ $request->connReason }}" disabled>
                          </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                              <label>INVOICE NUMBER</label>
                              <input style="width: 100%;" type="text" class="form-control" value="{{ $uniqueInvoiceNumber[0] }}" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>

                    <div class="row mb-2 px-4">
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                            <label>METER SIZE</label>
                            <input style="width: 100%;" type="text" class="form-control" value="{{ $request->meterSize }}" disabled>
                          </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                              <label>METER NUMBER</label>
                              <input style="width: 100%;" type="text" class="form-control" value="{{ $request->meterNo }}" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>

                    <div class="row mb-2 px-4">
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                            <label>INITIAL READING</label>
                            <input style="width: 100%;" type="text" class="form-control" value="{{ $request->ward }}" disabled>
                          </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                              <label>WORK DONE BY</label>
                              <input style="width: 100%;" type="text" class="form-control" value="{{ $request->plumber }}" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>

                    <div class="col-12 px-4">
                        <div class="form-group">
                          <label>REMARKS</label>
                          <textarea class="form-control rows="6" disabled>{{ $request->remarks }}</textarea>
                        </div>
                        <!-- /.form-group -->
                    </div>


                    <div class="text-center mt-4">
                    <div class="col-md-12">
                        <p> <b>Reference: </b>DWS-JHF <b>Revision: </b>0  <b>Date: </b> {{ now()->format('M d, Y') }} <a href="https://www.dawasa.go.tz/en" target="_blank"> DAWASA</a></p>
                    </div>
                    </div>
                    
            <!-- /.card-body -->
              </div>
            </div>

        </div>

        <div class="my-4">
            <button type="submit" class="btn btn-block btn-success"> <i class="nav-icon fa fa-print"></i> Print Customer File</button>
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>