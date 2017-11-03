@extends('layouts.app')

@section('title')
Lapeling | Detail Perusahaan
@endsection

@section('css')
<link href="{{ asset('assets/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/datatables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/datatables/dataTables.colVis.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/datatables/fixedColumns.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li><a href="{{ route('perusahaan.index') }}">Perusahaan</a></li>
                    <li class="active">Detail</li>
                </ul>
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                      <h2 class="panel-title">Detail Perusahaan</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <table class="table m-0">
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <td>{{ $perusahaan->nama_perusahaan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Perusahaan</th>
                                        <td>{{ $perusahaan->alamat_perusahaan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email Perusahaan</th>
                                        <td>{{ $user[0]->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>No HP</th>
                                        <td>{{ $perusahaan->no_tlp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Perusahaan</th>
                                        <td>{{ $perusahaan->jenis_perusahaan }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title">Riwayat Upload</h2>
                    </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="per-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama File</th>
                                                <th>Waktu Upload</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php $i = 1; ?>
                                        
                                        <tbody>
                                        @foreach ($laporan as $report)
                                            <tr>
                                                @if (isset($report->nama_file))
                                                <td>{{ $i++ }}</td>
                                                <td><a href="/berkas/{{ $report->nama_file }}" download="{{ $report->nama_file }}">{{ $report->nama_file }}</a></td>
                                                <td>{{ $report->created_at->format('d M Y') }}</td>
                                                <td>
                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['laporan.destroy', $report->id_laporan]]) }}
                                                        {{--  {{ Form::submit('Delete', ['class' => 'btn btn-danger', 
                                                                                    'onClick' => 'return showAlert($(this).closest('form'));', 
                                                                                    'href' => 'javascript:;']) }}  --}}
                                                    <a class="delete btn btn-sm btn-danger" href="javascript:;" onclick="return showAlert($(this).closest('form'));" rel="popover" data-container="body" 
                                                    data-toggle="popover" data-content="Hapus" data-placement="top"><i class="fa fa-trash"></i></a>
                                                    {{ Form::close() }}
                                                </td>
                                                @else
                                                <td colspan="3">Data Kosong</td>
                                                @endif
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
</div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
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

    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/switchery/js/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-quicksearch/jquery.quicksearch.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript" src="{{ asset('assets/plugins/autocomplete/jquery.mockjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/autocomplete/jquery.autocomplete.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/autocomplete/countries.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/pages/autocomplete.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/pages/jquery.form-advanced.init.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

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