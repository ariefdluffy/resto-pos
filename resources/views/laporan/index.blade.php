@extends('layouts.app')
@section('title')
Lapeling | Perusahaan
@endsection

@section('css')
<link href="assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">

<link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
      <div class="container">
      <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">Laporan</li>
      </ul>
      <div class="row">
        <div class="col-md-12">  
          <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Print Out Perusahaan</h2>
            </div>
              <div class="panel-body">
                <div class="form-group">
                  <div class="col-md-6">
                    <form method="POST" class="form-horizontal form-validation" action="{{ action('LaporanController@laporan_terpilih')  }}">
                      {!! csrf_field() !!}
                      <div class="form-group">
                        {!! Form::label('nama_perusahaan', 'Nama Perusahaan : ', array('class' => 'control-label')) !!}
                        <select name="id_perusahaan" class="col-md-6 form-control">
                            @foreach ($perusahaan as $data)
                              <option name="id_perusahaan" class="form-control" value="{{ $data->id_perusahaan }}" required>{{ $data->nama_perusahaan }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="control-label">&nbsp;
                        </label>
                        <div class="pull-left">
                            <button type="submit" formtarget="_blank" class="btn btn-embossed btn-primary">Lihat Data</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="col-md-6">
                    <form method="POST" class="form-horizontal form-validation" action="{{ action('LaporanController@laporan_all')  }}">
                      {!! csrf_field() !!}
                      <label class="col-md-6 control-label">Tampilkan semua data : </label>
                          <div class="pull-left">
                            <button type="submit" formtarget="_blank" class="btn btn-embossed btn-primary">Lihat Data</button>
                          </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
@endsection