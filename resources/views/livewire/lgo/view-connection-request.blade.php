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
              <img src="{{ asset('backend/dist/img/tz.jfif') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="" class="d-block">{{ auth('lgos')->user()->street }}</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <h5 class="text-info ml-2">Navigations</h4>
              <li class="nav-item">
                <a href="{{route('lgo.dashboard')}}" class="nav-link {{ request()->is('lgo/dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{route('lgo.listrequests')}}" class="nav-link {{ request()->is('lgo/listrequests') ? 'active' : '' }}">
                  <i class="nav-icon fa fa-tint"></i>
                  <p>
                    Connection Requests
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
    
              <form id="logout" action="{{ route('lgo.logout') }}" method="POST">
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
          <form autocomplete="off">
            @csrf
            <div class="card">
                <div class="card-body">

                    <div class="mb-4 text-center text-uppercase">
                        <h2><b>HALMASHAURI YA MANISPAA YA {{ auth('lgos')->user()->district }}</b></h1>
                    </div>

                    <div class="mt-4 d-flex justify-content-between align-items-center text-center">
                        <div>
                            <h5>
                                <b>
                                    Simu: {{auth('lgos')->user()->phone}}
                                </b>
                            </h5>
                        </div>
                        @if(auth('lgos')->user()->district == 'Ubungo')
                            <img src="{{ asset('backend/dist/img/ubungo.jpg') }}" alt="AdminLTE Logo" style= "width: 2in; height: 2.5in" class="brand-image">
                        @elseif(auth('lgos')->user()->district == 'Ilala')
                            <img src="{{ asset('backend/dist/img/ilala.jpg') }}" alt="AdminLTE Logo" style= "width: 2in; height: 2.5in" class="brand-image">
                        @elseif(auth('lgos')->user()->district == 'Kigamboni')
                            <img src="{{ asset('backend/dist/img/kigamboni.png') }}" alt="AdminLTE Logo" style= "width: 2in; height: 2.5in" class="brand-image">
                        @elseif(auth('lgos')->user()->district == 'Temeke')
                            <img src="{{ asset('backend/dist/img/temeke.jpg') }}" alt="AdminLTE Logo" style= "width: 2in; height: 2.5in" class="brand-image">
                        @else
                            <img src="{{ asset('backend/dist/img/kinondoni.png') }}" alt="AdminLTE Logo" style= "width: 2in; height: 2.5in" class="brand-image">
                        @endif

                        <h5 class="text-start text-uppercase">
                           <b>
                            OFISI YA SERIKALI YA <br>
                            MTAA WA {{auth('lgos')->user()->street}} <br>
                            KATA YA {{auth('lgos')->user()->ward}} <br>
                            S.L.P {{ auth('lgos')->user()->box }}, <br>
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
                                    {{auth('lgos')->user()->district}}
                                </b>
                            </h5>
                        </div>
                        <img src="{{ asset('backend/dist/img/user8-128x128.jpg') }}" alt="AdminLTE Logo" style= "width: 2in; height: 2in" class="brand-image">
                    </div>

                    <div class="text-center">
                        <h4><b>YAH: UTAMBULISHO WA MKAZI WA MTAA</b></h4>
                        <hr>
                    </div>

                    <div class="p-4">
                        <p>
                            Napenda Kuamtambulisha ndugu <b>{{ $request->fullName }}</b> ambaye ni mkazi katika mtaa wangu wa <b>{{auth('lgos')->user()->street}}</b>
                            katika nyumba namba <b>{{$request->house}}</b> iliypopo chini ya kiongozi wa shina namba <b>{{$request->plot}}</b>
                            chini ya mjumbe wake <b>{{$request->mjumbe}}</b>, aliyehakiki makazi ya muhusika tajwa kuwa sahihi.
                        </p>
                    </div>

                    <div class="p-4">
                        <p>
                            Anwani ya makazi ya muhusika -----------------------<b>P.O BOX {{ auth('lgos')->user()->box }}</b> <br>
                            Namba ya simu ya muhusika --------------------------<b>{{$request->phone}}</b> <br>
                            Kazi/shughuli ya muhusika ----------------------------<b>{{ $request->occupation }}</b> <br>
                        </p>
                    </div>

                    <hr class="mt-4">

                    <div class="text-info">
                      <h6> <i class="nav-icon fa fa-caret-right"></i> <b> Mkataba wa makubaliano: Tafadhali kubali mkataba huu kwanza. </b></h6>
                    </div>
                    <hr>
                    <div>
                      <p><b>Mimi, ninaepitisha utambulisho huu:</b> <br>
                        (1) Naahidi kuwa muhusika huyu anatambulika kisheria katika mtaa wangu. <br>
                        (2) Nimepitia vivuli vya vitambulisho vyake ambavyo vimedhibitishwa na mjumbe wake wa nyumba kumi. <br>
                        (3) Nafahamu ni kosa kisheria kupitisha utambulisho batili na hatua kali za kisheria zitachukuliwa endapo nitafanya hivyo.
                      </p>
                    </div>

                    <div class="d-flex flex-row text-info">
                      <div class="form-group mr-4">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input" id="customSwitch3">
                          <label class="custom-control-label" for="customSwitch3">Nakubaliana na mkataba huu</label>
                        </div>
                      </div>

                      <div>
                        <p><b>{{ now()->format('M d, Y') }}</b></p>
                      </div>
                    </div>

                    <hr class="mt-4">

                    <div class="row mt-4">
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                            <label> Chukua hatua<b class="text-red">*</b></label>
                            <select class="form-control select2 style="width: 100%;">
                              <option selected="selected">Chagua hatua</option>
                              <option value="Domestic">Subirisha Ombi</option>
                              <option value="Domestic">Kubali Ombi</option>
                              <option value="Commercial">Kataa Ombi</option>
                            </select>
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Sababu ya kukataa ombi hili</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                            <!-- /.form-group -->
                          </div>
                    </div>

                    <div class="d-flex justify-content-center text-center mt-4">
                        <h5>Ofisi ya Serikali ya mtaa huu itatoa ushirikiano unaohitajika. <br>
                            Asante wako ujenzi wa Taifa <br>
                            <b>{{ auth('lgos')->user()->messenger }}</b> <br>
                            Mwenyekiti wa Serikali ya Mtaa <br>
                            Mtaa wa {{ auth('lgos')->user()->street }} <br>
                            Kata ya {{ auth('lgos')->user()->ward }}
                        </h5>
                    </div>

                      <div class=" mt-4 mb-4">
                        <div class="col-12 d-flex flex-row">
                            <button type="submit" class="btn btn-block btn-success">Weka Mabadiliko</button>
                        </div>
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
                    <img src="{{ asset('backend/dist/img/smitaa.jpeg') }}" alt="AdminLTE Logo" class="brand-image">
                </div>

                <hr>

                <div class="mt-4 text-center text-uppercase">
                    <h5><b>Kitambulisho cha muhusika</b></h1>
                </div>

                <div class="d-flex justify-content-center">
                    <img src="{{ asset('backend/dist/img/cheti.jpg') }}" alt="AdminLTE Logo" class="brand-image">
                </div>
            </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
  </div>