@extends('layouts.customer.base')

@section('content')

    {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
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
                    <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                    <h5 class="text-info ml-2">Navigations</h4>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
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
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-blind"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside> --}}
    @include('layouts.customer.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><b>Customer Dashboard</b></h1>
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
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h4 class="card-title text-primary"><b>Water Connection Requests</b></h4>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <p class="text-warning">Pending Requests</p>
                                        <h4>0</h5>
                                    </div>
                                    <div>
                                        <p class="text-info">Approved Requests</p>
                                        <h4>0</h5>
                                    </div>
                                    <div>
                                        <p class="text-danger">Rejected Requests</p>
                                        <h4>0</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h4 class="card-title text-primary"><b>Meter Details</b></h4>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-info">Meter Number</p>
                                        <h4>XXX-XXX-XXX</h4>
                                    </div>
                                    <div>
                                        <p class="text-danger">Current reading</p>
                                        <h4>000m<sup>3</sup></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title text-primary">Customer Meter Reading History</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                  <th>Old Reading</th>
                                  <th>Initial Reading</th>
                                  <th>Total Consumption</th>
                                  <th>Price Per Unit</th>
                                  <th>Total Cost</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                  <td>Trident</td>
                                  <td>Internet
                                    Explorer 4.0
                                  </td>
                                  <td>Win 95+</td>
                                  <td> 4</td>
                                  <td>X</td>
                                </tr>
                                <tr>
                                  <td>Trident</td>
                                  <td>Internet
                                    Explorer 5.0
                                  </td>
                                  <td>Win 95+</td>
                                  <td>5</td>
                                  <td>C</td>
                                </tr>
                                <tr>
                                  <td>Trident</td>
                                  <td>Internet
                                    Explorer 5.5
                                  </td>
                                  <td>Win 95+</td>
                                  <td>5.5</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Trident</td>
                                  <td>Internet
                                    Explorer 6
                                  </td>
                                  <td>Win 98+</td>
                                  <td>6</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Trident</td>
                                  <td>Internet Explorer 7</td>
                                  <td>Win XP SP2+</td>
                                  <td>7</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Trident</td>
                                  <td>AOL browser (AOL desktop)</td>
                                  <td>Win XP</td>
                                  <td>6</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Other browsers</td>
                                  <td>All others</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>U</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                  <th>Rendering engine</th>
                                  <th>Browser</th>
                                  <th>Platform(s)</th>
                                  <th>Engine version</th>
                                  <th>CSS grade</th>
                                </tr>
                                </tfoot>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@stop
