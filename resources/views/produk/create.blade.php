@extends('layouts.app')

@section('title')
Resto | Tambah Data
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
                    <li><a href="{{ route('produk.index') }}">Master Barang</a></li>
                    <li class="active">Tambah Data</li>
                </ul>
                <div class="col-xs-6">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Master Barang</b></h4>
                        <div class="panel-body">
                          {!! Form::open(['url' => route('produk.store'),
                          'method' => 'post', 'class'=>'form-horizontal']) !!}
                          @include('produk._form')
                          {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Data Kategori</b></h4>
                        <div class="panel-body">
                          {!! Form::open(['url' => action('KategoriController@SimpanKategori'),
                          'method' => 'post', 'class'=>'form-horizontal']) !!}
                            <div class="form-group{{ $errors->has('nama_kategori') ? ' has-error' : '' }}">
                            {!! Form::label('nama_kategori', 'Nama Kategori', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('nama_kategori', null, ['class'=>'form-control']) !!}
                                {!! $errors->first('nama_kategori', '<p class="help-block">:message</p>') !!}
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{--  {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}  --}}
                                <button type="submit" 
                                href="javascript:;" 
                                onclick="$.Notification.autoHideNotify('success', 'top right', 'Prosesing...','Data sedang diproses.')"
                                class="btn btn-embossed btn-primary m-r-0"><i class="fa fa-floppy-o"></i> Simpan</button>
                            </div>
                            </div>
                          {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Data Rak</b></h4>
                        <div class="panel-body">
                          {!! Form::open(['url' => action('KategoriController@SimpanRak'),
                          'method' => 'post', 'class'=>'form-horizontal']) !!}
                            <div class="form-group{{ $errors->has('nama_rak') ? ' has-error' : '' }}">
                            {!! Form::label('nama_rak', 'Nama Rak', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('nama_rak', null, ['class'=>'form-control']) !!}
                                {!! $errors->first('nama_rak', '<p class="help-block">:message</p>') !!}
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{--  {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}  --}}
                                <button type="submit" 
                                href="javascript:;" 
                                onclick="$.Notification.autoHideNotify('success', 'top right', 'Prosesing...','Data sedang diproses.')"
                                class="btn btn-embossed btn-primary m-r-0"><i class="fa fa-floppy-o"></i> Simpan</button>
                            </div>
                            </div>
                          {!! Form::close() !!}
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


        <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/pages/jquery.form-advanced.init.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/plugins/autocomplete/jquery.mockjax.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/autocomplete/jquery.autocomplete.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/autocomplete/countries.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/pages/autocomplete.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/switchery/js/switchery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-quicksearch/jquery.quicksearch.js') }}"></script>
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
@endsection