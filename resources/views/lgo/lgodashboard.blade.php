@extends('layouts.lgo.lgobase')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h4 class="m-0"><b>LGO</b> Dashboard</h4>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Starter Page</li>
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
                <a href="{{route('lgo.listrequests')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{route('lgo.listrequests')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{route('lgo.listrequests')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{route('lgo.listrequests')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-12">
              <div class="card">
                  <div class="card-body">
                    <div class="mb-2">
                      <h3 class="card-title text-primary">Latest Customer Requests</h3>
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>street</th>
                        <th>Messenger</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                        <tbody>
                          <tr>
                            <td colspan="5" class="text-center p-4">
                                No connection request found at the moment!
                            </td>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection