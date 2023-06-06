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
            <form wire:submit.prevent="saveChanges" autocomplete="off">
              @csrf
              <div class="card">
                @if($request->lgoStatus == 'Approved' && $request->dawasaStatus == 'Approved')
                  <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-success text-lg">
                      Approved
                    </div>
                  </div>
                @elseif($request->lgoStatus == 'Rejected' | $request->dawasaStatus == 'Rejected')
                  <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-danger text-lg">
                      Rejected
                    </div>
                  </div>
                @else
                  <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-warning text-lg">
                      Pending
                    </div>
                  </div>
                @endif
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
                              Namba ya simu ya muhusika --------------------------<b>{{$request->phone}}</b> <br>
                              Kazi/shughuli ya muhusika ----------------------------<b>{{ $request->occupation }}</b> <br>
                              Taifa la muhusika ----------------------------------------<b>{{ $request->nationality }}</b> <br>
                              Sababu ya kufungiwa maji -----------------------------<b>{{ $request->connReason }}</b> <br>
                              Huduma inayohitajika ----------------------------------<b>{{ $request->servRequired }}</b> <br>
                          </p>
                      </div>

                      @if($request->surveyorStatus === 'Pending')
                      <div class="row mt-4">
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

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                @if($action == 'Rejected')
                                    <label>Reason for request rejection:<b class="text-red">*</b></label>
                                    <textarea wire:model.defer='state.note' class="form-control @error('state.note') is-invalid @enderror" rows="3" placeholder="Enter ..."></textarea>
                                    @error('state.note')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                    @enderror
                                @elseif($action == 'Approved')
                                    <label> Assign Surveyor<b class="text-red">*</b></label>
                                    <select wire:model.defer='state.surveyor' class="form-control select2 @error('state.surveyor') is-invalid @enderror" style="width: 100%;">
                                        <option selected>Choose surveyor..</option>
                                        @foreach($surveyors as $surveyor)
                                            <option value="{{ $surveyor->id}}">{{ $surveyor->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('state.surveyor')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                    @enderror
                                @else
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>

                    <div class=" mt-4 mb-4">
                        <div class="col-12 d-flex flex-row">
                            <div class="col-md-6">
                                <a href="{{ route('custcare.allrequests')}}"><button type="button" class="btn btn-block btn-danger">Cancel</button></a>
                              </div>
                              <div class="col-md-6">
                                <button type="submit" class="btn btn-block btn-success">Approve</button>
                                
                            </div>
                        </div>
                    </div>
                      @endif
  
                        <hr class="mt-4">
  
                        <div class="text-center">
                          <div class="col-md-12">
                            <p> <b>Date: </b> {{ now()->format('M d, Y') }} <a href="https://www.dawasa.go.tz/en" target="_blank">DAWASA</a></p>
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
  
              </div>
            </div>
        </section>
        <!-- /.content -->
      </div>
</div>
