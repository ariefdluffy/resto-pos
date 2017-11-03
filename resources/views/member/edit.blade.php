@extends('layouts.app')

@section('css')
<!-- Plugins css-->
<link href="{{ asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/multiselect/css/multi-select.css') }}"  rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
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

@section('title')
Lapeling | User
@endsection

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li><a href="{{ route('perusahaan.index') }}">Perusahaan</a></li>
                    <li class="active">Edit Data</li>
                </ul>
                <div class="col-sm-6">
                    <div class="panel panel-border panel-custom">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Data Perusahaan</h3>
                        </div>
                        <div class="panel-body">
                        {!! Form::model($perusahaan, ['action' => 'HomeController@updateMember', $perusahaan->id_perusahaan,
                            'method'=>'put', 'class'=>'form-horizontal']) !!}
                        {{--  {!! Form::model($perusahaan, ['url' => route('user.update', $perusahaan->id_perusahaan),
                        'method'=>'put', 'class'=>'form-horizontal']) !!}  --}}
                        @include('perusahaan._form')
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel panel-border panel-custom">
                        <div class="panel-heading">
                            <h2 class="panel-title">Upload Berkas</h2>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <form name="form_upload" id="form-upload" action="{{ action('HomeController@uploadMember') }}" role="form" class="form-validation" method="POST" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                            <input name="_method" id="form-upload-method" type="hidden" value="POST">
                                            <input name="id_perusahaan" id="upload-berkas-perusahaan" type="hidden" value="{{ $perusahaan->id_perusahaan }}">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Upload Dokumen</label>
                                                        <input type="file" name="nama_file" class="filestyle" data-iconname="fa fa-cloud-upload" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="pull-left">
                                                        <button type="submit" 
                                                            href="javascript:;" 
                                                            onclick="$.Notification.autoHideNotify('warning', 'top right', 'Prosesing...','Data sedang di UPLOAD.')"
                                                            class="btn btn-embossed btn-primary m-r-0 waves-effect waves-light autohidebut">
                                                            <i class="fa fa-floppy-o"></i> Upload Data</button>
                                                        {{--  <a type="submit" class="btn btn-default waves-effect waves-light autohidebut"
                                                            href="javascript:;" 
                                                            onclick="$.Notification.autoHideNotify('custom', 'top right', 'Prosesing...','Data sedang di UPLOAD.')">Upload File</a>  --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
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

    <script src="{{ asset('assets/plugins/notifyjs/js/notify.js') }}"></script>
    <script src="{{ asset('assets/plugins/notifications/notify-metro.js') }}"></script>

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