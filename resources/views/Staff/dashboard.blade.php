@extends('layouts.staff.base')

@section('content')
<div class="content-wrapper">
  
    @if(auth('staff')->user()->role == 'Admin')

     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h4 class="m-0"><b>Admin </b> Dashboard</h4>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $allCustomers }}</h3>
  
                  <p>Total Customers</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fa fa-users"></i>
                </div>
                <a href="{{ route('staff.customers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $allLgos }}</h3>
  
                  <p>Total LGO's</p>
                </div>
                <div class="icon">
                  <i class="fa fa-building"></i>
                </div>
                <a href="{{ route('staff.lgo')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$allStaffs}}</h3>
  
                  <p>Total Staffs</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-circle"></i>
                </div>
                <a href="{{ route('staff.allstaffs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>{{ $allRequests }}</h3>
  
                  <p>Total Requests</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fa fa-tint"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
  </section>
  <!-- /.content -->

    @else
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h4 class="m-0"><b>Staff </b> Dashboard</h4>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <!-- /.content-header -->
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>0</h3>
    
                    <p>Total Requests</p>
                  </div>
                  <div class="icon">
                    <i class="nav-icon fa fa-tint"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>0</h3>
    
                    <p>Approved Requests</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-check-circle"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>0</h3>
    
                    <p>Pending Requests</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-hourglass-half"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>0</h3>
    
                    <p>Rejected Requests </p>
                  </div>
                  <div class="icon">
                    <i class="nav-icon fa fa-ban"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
          </div>
      </div>
    </section>
    <!-- /.content -->
    @endif
    
</div>
@endsection