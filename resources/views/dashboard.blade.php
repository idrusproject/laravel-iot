@extends('layouts.main')

@section('container')
<style>
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }
  
  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }
  
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  input:checked + .slider {
    background-color: #2196F3;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }
  
  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
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

            <!-- Info boxes -->
            <div class="row"> <!-- /.row -->
              @if (count($dashboards) > 0)
                @foreach ($dashboards as $dt )
                @endforeach 
              @endif
              

              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-plug"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Voltage</span>
                    <h2 class="info-box-number">
                      @if (count($dashboards) > 0)
                        <span id="value1"></span>  
                        <small>Volt </small>
                      @else
                        No Data
                      @endif
                    </h2>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tree"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Current</span>
                    <h2 class="info-box-number">
                      @if (count($dashboards) > 0)
                        <span id="value2"></span>  
                        <small>Amp </small>
                      @else
                        No Data
                      @endif
                    </h2>
                  </div>
                </div>
              </div>
              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-power-off"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Power</span>
                    <h2 class="info-box-number">
                      @if (count($dashboards) > 0)
                        <span id="value3"></span>   
                        <small>Watt </small>
                      @else
                        No Data
                      @endif
                    </h2>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-battery-half"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">energy</span>
                    <h2 class="info-box-number">
                      @if (count($dashboards) > 0)
                        <span id="value4"></span>  
                        <small>Kw/h </small>
                      @else
                        No Data
                      @endif
                    </h2>
                  </div>
                </div>
              </div>
            </div> <!-- /.row -->

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  @if (session()->has('mqtt-notif1'))
                      <br>
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('mqtt-notif1') }}
                      </div>
                  @endif
                  <br>
                  <table class="text-center">
                    <tr>
                      <form action="{{ route('toggle.relays') }}" method="POST">
                        <td>
                          @csrf
                          <label for="">Relay 1</label>
                          <br>
                          <label class="switch">
                            <input type="checkbox" name="relay1" onchange="this.form.submit()" {{ $latestMessage && $latestMessage->relay1 == "on" ? 'checked' : '' }} >
                            <span class="slider round"></span> 
                          </label>
                          <br>
                          <label for="">{{ $latestMessage ? $latestMessage->relay1 : 'none' }}</label>
                        </td>
                        <td>
                          @csrf
                          <label for="">Relay 2</label>
                          <br>
                          <label class="switch">
                            <input type="checkbox" name="relay2" onchange="this.form.submit()" {{  $latestMessage && $latestMessage->relay2 == "on" ? 'checked' : '' }} >
                            <span class="slider round"></span>
                          </label>
                          <br>
                          <label for="">{{ $latestMessage ? $latestMessage->relay2 : 'none' }}</label>
                        </td>
                        <td>
                          @csrf
                          <label for="">Relay 3</label>
                          <br>
                          <label class="switch">
                            <input type="checkbox" name="relay3" onchange="this.form.submit()" {{  $latestMessage && $latestMessage->relay3 == "on" ? 'checked' : '' }} >
                            <span class="slider round"></span>
                          </label>
                          <br>
                          <label for="">{{ $latestMessage ? $latestMessage->relay3 : 'none' }}</label>
                        </td>
                        <td>
                          @csrf
                          <label for="">Relay 4</label>
                          <br>
                          <label class="switch">
                            <input type="checkbox" name="relay4" onchange="this.form.submit()" {{  $latestMessage && $latestMessage->relay4 == "on" ? 'checked' : '' }} >
                            <span class="slider round"></span>
                          </label>
                          <br>
                          <label for="">{{ $latestMessage ? $latestMessage->relay4 : 'none' }}</label>
                        </td>
                      </form>
                    </tr>
                  </table>
                  <br>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  @if (session()->has('mqtt-notif2'))
                      <br>
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('mqtt-notif2') }}
                      </div>
                  @endif
                  <form action="{{ route('publish-mqttCustom') }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <p>Latest MQTT topic: <b> {{ $latestCustomMessage ? $latestCustomMessage->topic : 'none' }} </b> </p>
                      <p>Latest MQTT message: <b> {{ $latestCustomMessage ? $latestCustomMessage->message : 'none' }} </b> </p>
                      <div class="form-group">
                        <label for="">Topic</label>
                        <input  type="text" id="topic" name="topic" class="form-control" placeholder="MQTT Topic To host {{ ENV('MQTT_HOST') }}">
                      </div>
                      <div class="form-group">
                        <label for="">MQTT Message</label>
                        <input  type="text" id="custom_data" name="custom_data" class="form-control" placeholder="MQTT Message">
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.content-wrapper -->
    <script type="text/javascript">
      $(document).ready(function() {
        setInterval(function() {
          $("#value1").load("admin/dashboard/value1");
          $("#value2").load("admin/dashboard/value2");
          $("#value3").load("admin/dashboard/value3");
          $("#value4").load("admin/dashboard/value4");
          // console.log("get data");
        }, 1000);
      })
    </script>
@endsection