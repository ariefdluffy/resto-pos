@extends('layouts.app')
@section('title')
Resto PoS
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
        
            <!-- Page-Title -->
            <div class="row">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="active">Produk</a></li>
                </ul>
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Data Produk</b></h4>
                        <div class="panel panel-default panel-border">
                        <div class="panel-content">
                            <div class="row">
                                <div class="btn-group col-sm-12">
                                    <a href="{{ route('produk.create') }}" class="btn btn-primary waves-effect waves-light" data-overlaySpeed="100" data-overlayColor="#36404a">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                        
                            <table id="per-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <tbody>
                                @foreach ($barang as $items)
                                <tr>
                                    <td>{{ $i++  }}</td>
                                    <td>{{ $items->kode_barang  }}</td>
                                    <td>{{ $items->nama_barang  }}</td>
                                    <td>Rp. {{ $items->harga  }}</td>
                                    <td>
                                        {!! Form::open(array('route' => array('produk.destroy', $items->id_barang), 'method' =>'DELETE')) !!}
                                            <a class="edit btn btn-sm btn-success" href="{{ route('produk.edit', $items->id_barang) }}" data-container="body" data-toggle="popover" data-content="Edit" data-placement="top"><i class="fa fa-edit"></i></a>
                                            <a class="btn-sm btn-warning waves-effect waves-light" href="{{ route('produk.show', $items->id_perusahaan) }}" data-container="body" data-toggle="popover" data-content="Detail" data-placement="top">Detail</a>
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

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="assets/plugins/datatables/dataTables.colVis.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

<script src="assets/pages/datatables.init.js"></script>

<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

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