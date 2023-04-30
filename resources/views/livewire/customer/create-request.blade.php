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
          <form wire:submit.prevent="saveRequest" autocomplete="off">
            @csrf
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
                                    <select wire:model.defer='state.connReason' class="form-control select2 @error('state.connReason') is-invalid @enderror" style="width: 100%;">
                                      <option selected="selected">Choose Reason..</option>
                                      <option value="Domestic">Domestic</option>
                                      <option value="Commercial">Commercial</option>
                                      <option value="Industrial">Industrial</option>
                                      <option value="Domestic Institutions">Domestic Institutions</option>
                                      <option value="Other Institutions">Other Institutions</option>
                                      <option value="Kiosk">Kiosk</option>
                                      <option value="Tanker/Dumper">Tanker/Dumper</option>
                                      <option value="Others">Others</option>
                                    </select>
                                    @error('state.connReason')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                  @enderror
                                  </div>
                                  <!-- /.form-group -->
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Service Required <b class="text-red">*</b></label>
                                      <select wire:model.defer='state.servRequired' class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Choose Reason..</option>
                                        <option value="Water Only">Water Only</option>
                                        <option value="Sewerage Only">Sewerage Only</option>
                                        <option value="Water and Sewerage">Water and Sewerage</option>
                                        <option value="Others">Others</option>
                                      </select>
                                    </div>
                                    <!-- /.form-group -->
                                  </div>
                            </div>

                            <hr class="mt-4">

                            <div class="text-center mt-4">
                                <h5> <b>Details of Applicant requiring service </b> <b class="text-red">*</b></h5>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                  <div class="form-group">
                                    <label>Full Name</label>
                                    <input wire:model.defer='state.fullName' style="width: 100%;" type="text" class="form-control" id="fullName" placeholder="Enter full name">
                                  </div>
                                  <!-- /.form-group -->
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Occupation</label>
                                      <input wire:model.defer='state.occupation' style="width: 100%;" type="text" class="form-control" id="occupation" placeholder="Enter occupation">
                                    </div>
                                    <!-- /.form-group -->
                                  </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                  <div class="form-group">
                                    <label>Nationality</label>
                                    <input wire:model.defer='state.nationality' style="width: 100%;" type="text" class="form-control" id="nationality" placeholder="Enter nationality">
                                  </div>
                                  <!-- /.form-group -->
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Phone Number</label>
                                      <input wire:model.defer='state.phone' style="width: 100%;" type="text" class="form-control" id="phone" placeholder="Enter phone number">
                                    </div>
                                    <!-- /.form-group -->
                                  </div>
                            </div>

                            {{-- Image upload --}}
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Passport size (Image only)</label>
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="custom-file">
                                          <input wire:model.defer='passport' style="width: 100%;" type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">
                                            @if($passport)
                                              {{$passport->getClientOriginalName() }}
                                            @else
                                              Choose file
                                            @endif
                                          </label>
                                        </div>
                                    </div>
                                  <!-- /.form-group -->
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Recognized identity card (Image only) </label>
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="custom-file">
                                          <input wire:model.defer='idCard' style="width: 100%;" type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">
                                            @if($idCard)
                                              {{$idCard->getClientOriginalName() }}
                                            @else
                                              Choose file
                                            @endif
                                          </label>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                  </div>
                            </div>
                            {{-- Image upload end --}}

                            <hr class="mt-4">

                            <div class="text-center mt-4">
                                <h5> <b>Address of Physical Location for Connection </b> <b class="text-red">*</b></h5>
                            </div>

                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="form-group">
                                  <label>Applicant District</label>
                                  <select wire:model.defer='state.district' wire:change='getDistrict($event.target.value)' class="form-control select2" style="width: 100%;">
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
                                  <select wire:model.defer='state.ward' wire:change='getWard($event.target.value)' class="form-control select2" style="width: 100%;">
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
                                <select wire:model.defer='state.street' wire:change='getStreet($event.target.value)' class="form-control select2" style="width: 100%;">
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
                                  <select wire:model.defer='state.lgoId' class="form-control select2" style="width: 100%;">
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

                        <div class="row">
                          <div class="col-12 col-md-6">
                            <div class="form-group">
                              <label>House Number/Name</label>
                              <input wire:model.defer='state.house' style="width: 100%;" type="text" class="form-control" id="house" placeholder="Enter house number or name">
                            </div>
                            <!-- /.form-group -->
                          </div>
                          <div class="col-12 col-md-6">
                              <div class="form-group">
                                <label>Plot Number</label>
                                <input wire:model.defer='state.plot' style="width: 100%;" type="text" class="form-control" id="plot" placeholder="Enter plot number">
                              </div>
                              <!-- /.form-group -->
                            </div>
                        </div>

                       <hr class="mt-4">

                      <div class="text-info">
                        <h6> <i class="nav-icon fa fa-caret-right"></i> <b> Statement by Personal/Entity Responsible for paying Deposit, Connection Charges, Monthly Bill and Other Related Charges: <br> &nbsp; &nbsp; &nbsp; Please tick agrrement to terms. </b></h6>
                      </div>
                      <hr>
                      <div>
                        <p><b>I, the undersigned, hereby acknowledge:</b> <br>
                          (1) Where the Applicant is the Landloard of the connection address, Dawasa requires prior written approval
                          from the Landloard that is responsible for paying all relevant charges. If an applicant vacates the connection
                          address with unpaid charges, the landloard shall be held legally responsible for setting all such unpaid charges,
                          including related penalties or legal cost arising. <br>
                          (2) That no connection work by any party will begin until the survey is approved by Dawasa. <br>
                          (3) That i require to sign the formal customer contract and pay required security deposit, as well as any connection 
                          or other charges before any work begins on a new connection, or the connection is activated or transferred in the 
                          case of existing registered connection.
                        </p>
                      </div>

                      <div class="d-flex flex-row text-info">
                        <div class="form-group mr-4">
                          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" wire:model='checked' class="custom-control-input" id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">I accept the terms and conditions.</label>
                          </div>
                        </div>

                        <div>
                          <p><b>{{ now()->format('M d, Y') }}</b></p>
                        </div>
                      </div>

                      <hr class="mt-4">

                      <div class=" mt-4 mb-4">
                        <div class="col-12 d-flex flex-row">
                          <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-danger">Cancel Application</button>
                          </div>
                          <div class="col-md-6">
                            @if($checked == true)
                              <button type="submit" class="btn btn-block btn-success">Submit Application</button>
                            @else
                              <button type="submit" class="btn btn-block btn-success" disabled>Agree Terms First</button>
                            @endif
                          </div>
                        </div>
                      </div>

                      <hr class="mt-4">
                          

                      <div class="d-flex justify-content-end">
                        <div class="col-md-6">
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