<div class="form-group{{ $errors->has('diskon_persen') ? ' has-error' : '' }}">
{!! Form::label('diskon_persen', 'Diskon Persen', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::number('diskon_persen', null, ['class'=>'form-control']) !!}
        {!! $errors->first('diskon_persen', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('diskon_rupiah') ? ' has-error' : '' }}">
{!! Form::label('diskon_rupiah', 'Diskon Rupiah', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::number('diskon_rupiah', null, ['class'=>'form-control']) !!}
        {!! $errors->first('diskon_rupiah', '<p class="help-block">:message</p>') !!}
    </div>
</div>


                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Data Kategori</b></h4>
                        <div class="panel panel-default panel-border">
                    
                        <div class="panel-body">
                        
                            <table id="per-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <tbody>
                                @foreach ($kategori as $kat)
                                <tr>
                                    <td>{{ $i++  }}</td>
                                    <td>{{ $kat->nama_kategori  }}</td>
                                    <td>
                                        {!! Form::open(array('action' => array('KategoriController@hapus', $kat->id_kategori), 'method' =>'DELETE')) !!}
                                            <a class="delete btn btn-sm btn-danger" href="javascript:;" onclick="return showAlert($(this).closest('form'));" rel="popover" data-container="body" 
                                            data-toggle="popover" data-content="Hapus" data-placement="top"><i class="fa fa-trash"></i></a>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>                    
                            </table>
                        </div>
                    </div>
                </div>


                @extends('layouts.app')
@section('title')
Resto PoS
@endsection

@section('css')
<link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">
 <!-- Plugins css-->
<link href="{{ asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/multiselect/css/multi-select.css') }}"  rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
        
            <!-- Page-Title -->
            <div class="row">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="active">Produk</a></li>
                </ul>
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Data Kategori</b></h4>
                        <div class="panel panel-default panel-border">
                    
                        <div class="panel-body">
                        
                            <table id="per-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <tbody>
                                @foreach ($kategori as $kat)
                                <tr>
                                    <td>{{ $i++  }}</td>
                                    <td>{{ $kat->nama_kategori  }}</td>
                                    <td>
                                        {!! Form::open(array('action' => array('KategoriController@hapus', $kat->id_kategori), 'method' =>'DELETE')) !!}
                                            <a class="delete btn btn-sm btn-danger" href="javascript:;" onclick="return showAlert($(this).closest('form'));" rel="popover" data-container="body" 
                                            data-toggle="popover" data-content="Hapus" data-placement="top"><i class="fa fa-trash"></i></a>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>                    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/detect.js') }}"></script>
<script src="{{ asset('assets/js/fastclick.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('assets/js/jquery.app.js') }}"></script>

<script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.colVis.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.fixedColumns.min.js') }}"></script>

<script src="{{ asset('assets/pages/datatables.init.js') }}"></script>
<!-- Sweet-Alert  -->
<script src="{{ asset('assets/plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.sweet-alert.init.js') }}"></script>


<script>
$(document).ready(function () {
    $('#per-table').dataTable();
});

function showAlert(form) {
  swal({
    title: "Apakah anda yakin?",
    text: "Menghapus data yang anda pilih!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
    closeOnConfirm: false
  },
  function(){
    form.submit();
  });
};
</script>


@endsection