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
              <div class="card">
                  <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-center align-items-center text-center">
                                <img src="{{ asset('backend/dist/img/tz.JFIF') }}" alt="AdminLTE Logo" width="75" height="80" class="brand-image">
                                <h4> <b> <br> DAWASA WATER SUPPLY AND SANITATION AUTHORITY <br><h5><b>ISO 9001:2015 CERTIFIED</b></h5></b> </h4>
                                <img src="{{ asset('backend/dist/img/AdminLTELogo.jpeg') }}" alt="AdminLTE Logo" width="100" height="80" class="brand-image">
                            </div>
                            <div class="text-center">
                                <p>DAWASA building, Dunga/malanga Road, Mwananyamala Area <br>
                                    P.O BOX 1573, Dar es Salaam - Tanzania | Tel +255 22 2760006/+255 22 27600015 <br>
                                    Fax: <a href="call:+255 22 2762480">+255 22 2762480</a> | Email: <a href="Mailto:ceo@dawasa.go.tz">ceo@dawasa.go.tz</a> | Website: <a href="https://www.dawasa.go.tz/en" target="_blank">www.dawasa.go.tz</a> <br>
                                    Info@dawasa.co.tz / 0800110064 / *150*00# (Bure)
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <h4><b>NEW CUSTOMER CONNECTION APPLICATION FORM</b>
                                    <br>
                                    <h6 class="text-danger">All sections marked by * must be filled by applicant</h6>
                                </h4>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 col-md-6">
                                  <div class="form-group">
                                    <label>Connection For <b class="text-red">*</b></label>
                                    <select class="form-control select2" style="width: 100%;">
                                      <option selected="selected">Choose Reason..</option>
                                      <option>Domestic</option>
                                      <option>Commercial</option>
                                      <option>Industrial</option>
                                      <option>Domestic Institutions</option>
                                      <option>Other Institutions</option>
                                      <option>Kiosk</option>
                                      <option>Tanker/Dumper</option>
                                      <option>Others</option>
                                    </select>
                                  </div>
                                  <!-- /.form-group -->
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Service Required <b class="text-red">*</b></label>
                                      <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Choose Reason..</option>
                                        <option>Water</option>
                                        <option>Sewerage Only</option>
                                        <option>Water and Sewerage</option>
                                        <option>Others</option>
                                      </select>
                                    </div>
                                    <!-- /.form-group -->
                                  </div>
                            </div>

                            <div class="text-center mt-4">
                                <h5> <b>Details of Applicant requiring service </b> <b class="text-red">*</b></h5>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                  <div class="form-group">
                                    <label>Full Name</label>
                                    <input style="width: 100%;" type="text" class="form-control" id="fullName" placeholder="Enter full name">
                                  </div>
                                  <!-- /.form-group -->
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Occupation</label>
                                      <input style="width: 100%;" type="text" class="form-control" id="occupation" placeholder="Enter occupation">
                                    </div>
                                    <!-- /.form-group -->
                                  </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                  <div class="form-group">
                                    <label>Nationality</label>
                                    <input style="width: 100%;" type="text" class="form-control" id="nationality" placeholder="Enter nationality">
                                  </div>
                                  <!-- /.form-group -->
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Phone Number</label>
                                      <input style="width: 100%;" type="text" class="form-control" id="phone" placeholder="Enter phone number">
                                    </div>
                                    <!-- /.form-group -->
                                  </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="custom-file">
                                          <input style="width: 100%;" type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Upload Passport Size</label>
                                        </div>
                                    </div>
                                  <!-- /.form-group -->
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="custom-file">
                                          <input style="width: 100%;" type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Upload Recognized Identity Card</label>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                  </div>
                            </div>

                            <div class="text-center mt-4">
                                <h5> <b>Address of Physical Location for Connection </b> <b class="text-red">*</b></h5>
                            </div>

                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="form-group">
                                  <label>Applicant District</label>
                                  <select wire:change='getDistrict($event.target.value)' class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">Choose District..</option>
                                    <option value="Ilala">Ilala</option>
                                    <option value="Kinondoni">Kinondoni</option>
                                    <option value="Temeke">Temeke</option>
                                    <option value="Ubungo">Ubungo</option>
                                    <option value="Kigamboni">Kigamboni</option>
                                  </select>
                                </div>
                                <!-- /.form-group -->
                              </div>

                              <div class="col-12 col-md-6">
                                <div class="form-group">
                                  <label>Applicant Ward</label>
                                  <select wire:change='getWard($event.target.value)' class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">Choose Ward..</option>
                                      @if (!empty($selectedDistrict))
                                      @foreach ($kata as $value)
                                          <option value="{{ $value }}">{{ $value }}</option>
                                      @endforeach
                                      @endif
                                  </select>
                                </div>
                              </div>

                          </div>

                          <div class="row">
                            <div class="col-12 col-md-6">
                              <div class="form-group">
                                <label>Applicant Street</label>
                                <select wire:change='getStreet($event.target.value)' class="form-control select2" style="width: 100%;">
                                  <option selected="selected">Choose Street..</option>
                                    @if (!empty($selectedWard))
                                    @foreach ($lgos as $lgo)
                                          <option value="{{ $lgo->street }}">{{ $lgo->street }}</option>
                                    @endforeach
                                    @endif
                                </select>
                              </div>
                              <!-- /.form-group -->
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                  <label>Applicant Messenger</label>
                                  <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Choose Messenger..</option>
                                      @if (!empty($selectedStreet))
                                      @foreach ($lgos2 as $lgo2)
                                            <option value="{{ $lgo2->id }}">{{ $lgo2->messenger }}</option>
                                      @endforeach
                                      @endif
                                  </select>
                                </div>
                                <!-- /.form-group -->
                              </div>
                        </div>

                          
                              
                  <!-- /.card-body -->
                </div>
            </div>
      </section>
      <!-- /.content -->
    </div>
  </div>