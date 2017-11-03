@extends('layouts.app')

@section('title')
Edit Data | Lapeling
@endsection

@section('css')
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
                        {!! Form::model($perusahaan, ['url' => route('perusahaan.update', $perusahaan->id_perusahaan),
                            'method'=>'put', 'class'=>'form-horizontal']) !!}
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
                                        <form name="form_upload" id="form-upload" action="{{ action('PerusahaanController@uploadBerkas') }}" role="form" class="form-validation" method="POST" enctype="multipart/form-data">
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
@endsection