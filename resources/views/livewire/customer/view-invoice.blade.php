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
              <img src="{{ asset('backend/dist/img/user.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
              <a href="" class="d-block">{{ auth()->user()->name }}</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <h5 class="text-info ml-2">Navigations</h4>
              <li class="nav-item">
                <a href="{{route('customer.dashboard')}}" class="nav-link {{ request()->is('customer/dashboard') ? 'active' : '' }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{route('customer.listrequests')}}" class="nav-link {{ request()->is('customer/listrequests') ? 'active' : '' }}" class="nav-link" class="nav-link">
                  <i class="nav-icon fa fa-tint"></i>
                  <p>
                    Connection Requests
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{route('customer.surveyors')}}" class="nav-link {{ request()->is('customer/listsurveyors') ? 'active' : '' }}" class="nav-link" class="nav-link">
                  <i class="nav-icon fa fa-tasks"></i>
                  <p>
                    Site Surveyors
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{ route('customer.invoices')}}" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p>
                   Invoices
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
                <a href="javascript:void(0);" class="nav-link"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  <i class="nav-icon fa fa-blind"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
    
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
                                      <p> <b>Coordinates: </b> {{$request->cordX}}, {{$request->cordY}} <b>Nearest Meter:</b> {{$request->distance}}m<sup>3 </p>
                                    </div>
                                </div>

                                <div class="text-center mt-2">
                                    <div class="col-md-12">
                                        <p> Unaweza kufanya malipo kupitia <b>M-Pesa, Tigo Pesa, Airtel Money au HaloPesa.</b> <br> Pia unaweza kufanya malipo kupitia Benki za <b>CRDB, NMB, NBC na Stanbic Bank </b> tu. <br> Kwa msaada zaidi tupigie kupitia namba <b>0800110064</b> bure.</p>
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
              </form>
          </section>
          <!-- /.content -->
    </div>
</div>

