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
                <a href="{{route('customer.dashboard')}}" class="nav-link {{ request()->is('customer/dashboard') ? 'active' : '' }}" class="nav-link" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{route('customer.listrequests')}}" class="nav-link {{ request()->is('customer/listrequests') ? 'active' : '' }}" class="nav-link" class="nav-link" class="nav-link">
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
          <form wire:submit.prevent="saveChanges" autocomplete="off">
            @csrf
            <div class="card">
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
          </form>

          <div class="card">
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


                <div class="col-12 d-flex justify-content-center mt-4 ">
                    <div class="col-md-6">
                        <div class="form-group">
                            @if($request->lgoStatus == 'Approved' && $request->dawasaStatus == 'Approved')
                                <img src="{{ asset('backend/dist/img/approved.png') }}" style="width: 3.3in; height: 3in;" alt="AdminLTE Logo" class="brand-image">
                            @elseif($request->lgoStatus == 'Rejected' | $request->dawasaStatus == 'Rejected')
                                <img src="{{ asset('backend/dist/img/rejected.png') }}" style="width: 3.3in; height: 3in;" alt="AdminLTE Logo" class="brand-image">
                            @else
                                <img src="{{ asset('backend/dist/img/pending.png') }}" style="width: 4in; height: 2.2in;" alt="AdminLTE Logo" class="brand-image">
                            @endif
                        </div>
                        <!-- /.form-group -->
                    </div>
              </div>

                @if($request->lgoNote)
                    <div class="d-flex justify-content-center text-danger mb-4">
                        <h5><b>Reason for Rejection: {{ $request->lgoNote }}</b></h5>
                    </div>
                @elseif($request->dawasaNote)
                    <div class="d-flex justify-content-center text-danger mb-4">
                        <h5><b>Reason for Rejection: {{ $request->dawasaNote }}</b></h5>
                    </div>
                @else
                    <div class="d-flex justify-content-center text-danger mb-4">
                        <h5></h5>
                    </div>
                @endif

            </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
  </div>