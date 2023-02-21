@extends('layouts.main')

@section('container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">History</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">History</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <section class="content">
          <div class="col-12">
            <div class="card-body">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Doorlock Access Log</h3>
    
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="col-sm-2">
                          <form action="{{ url('/delete-all-data') }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-block btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete all data?');">Delete All Data</button>
                          </form>
                        </div>
                        
                        @if (session()->has('success'))
                            <br>
                            <div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fas fa-check"></i> Alert!</h5>
                              {{ session('success') }}
                            </div>
                        @endif
                        <br>
                        <table id="example1" class="table table-bordered table-striped display">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tanggal</th>
                                    <th>UID</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ( $histories as $history )
                                <tr>
                                    <td> {{ $history["id"] }} </td>
                                    <td> {{ date("d-M-Y H:i:s", $history["date"]) }} </td>
                                    <td> {{ $history["uid"] }} </td>
                                    <td> {{ $history["type"] }} </td>
                                    <td> {{ $history["description"] }} </td>
                                    <td>
                                      <form action="{{ url('/delete/' . $history->id) }}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button type="submit" class="btn btn-block btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete {{ $history->uid }}?');">Delete</button>
                                      </form>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>UID</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>    
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection