@extends('layouts.app')
@section('title')
Resto PoS | Transaksi
@endsection

@section('css')
<link href="assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
 <!-- Plugins css-->
<link href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
<link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
<link href="assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
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
                    <li class="active">Transaksi</a></li>
                </ul>
                <div class="col-sm-12">
                    <div class="panel panel-border panel-custom">
                        <div class="panel-heading">
                            <h3 class="panel-title">Transaksi</h3>
                        </div>
                        <div class="panel-body">
                        {!! Form::open(['url' => action('TransaksiController@SimpanTransaksi'), 'method' => 'post', 'class'=>'form-horizontal']) !!}
                            <div class="col-sm-6">
                            <!-- {!! Form::text('invoice', $tampil, ['class'=>'col-md-4 control-label']) !!} -->
                                    <div class="form-group">
                                    {!! Form::label('invoice', 'Invoice', ['class'=>'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('invoice', $tampil, ['class'=>'form-control', 'readonly' => '']) !!}
                                            {!! $errors->first('invoice', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    {!! Form::label('id_karyawan', 'Nama Karyawan', ['class'=>'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('id_karyawan', '2', ['class'=>'form-control', 'readonly' => '']) !!}
                                            {!! $errors->first('id_karyawan', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('id_tipe_bayar') ? ' has-error' : '' }}">
                                    {!! Form::label('id_tipe_bayar', 'Bayar', ['class'=>'col-md-4 control-label']) !!}
                                        <div class="col-md-4">
                                            <select class="form-control select2" name="id_tipe_bayar">
                                                <option name="id_tipe_bayar" value="1">Cash</option>
                                                <option name="id_tipe_bayar" value="2">Debit</option>
                                            </select>
                                            {!! $errors->first('id_tipe_bayar', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                                    {!! Form::label('ket', 'Keterangan', ['class'=>'col-md-4 control-label']) !!}
                                        <div class="col-md-8">
                                            {!! Form::text('ket', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('ket', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('id_barang') ? ' has-error' : '' }}">
                                    {!! Form::label('id_barang', 'Nama Menu', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select class="form-control select2" name="id_barang">
                                            @foreach($barang as $item)
                                                <option name="id_barang" value="{{ $item->id_barang }}">{{ $item->kode_barang }} | {{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('id_barang', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('harga_jual') ? ' has-error' : '' }}">
                                {!! Form::label('harga_jual', 'Harga Jual', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::number('harga_jual', $barang[0]->harga, ['class'=>'form-control',
                                         'id' => 'harga_jual','name' => 'harga_jual', 'readonly' => '', 'onkeyup' => 'sum();']) !!}
                                        {!! $errors->first('harga_jual', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
                                {!! Form::label('qty', 'Jumlah Beli', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::number('qty', null, ['class'=>'form-control', 'min' => '1',
                                         'max' => '100', 'name' => 'qty', 'id'=>'qty', 'autofocus' => '' ,'onkeyup' => 'sum();']) !!}
                                        {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Total Harga
                                    </label>
                                    <div class="col-md-4">
                                        <div class="pull-left">
                                            {!! Form::number('total', null, ['class'=>'form-control', 
                                            'id' => 'total', 'readonly' => '']) !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- {!! Form::hidden('status', 'menunggu', ['class'=>'form-control']) !!} -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">&nbsp;
                                    </label>
                                    <div class="col-sm-4">
                                    <div class="pull-left">
                                        <button type="submit" 
                                        href="javascript:;" 
                                        onclick="$.Notification.autoHideNotify('success', 'top right', 'Prosesing...','Data masuk invoice.')"
                                        class="btn btn-embossed btn-primary m-r-0"><i class="fa fa-floppy-o"></i> Simpan</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            {!! Form::open(['url' => action('TransaksiController@SimpanTransaksi'), 'method' => 'post', 'class'=>'form-horizontal']) !!}
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="panel-heading">
                                Tabel Detail Transaksi
                            </div>
                            <div class="panel-body">
                                <div class="row" id="row-order">
                                    <div class="panel-content pagination2">
                                        <table id="tbl-order" class="table table-hover table-dynamic" width="100%">
                                            <col style="width:3%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Produk</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Sub Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <?php $i = 1; ?>
                                            <tbody>
                                                @foreach ($showTable as $pen)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $pen->kode_barang }}</td>
                                                        <td>{{ $pen->nama_barang }}</td>
                                                        <td>{{ $pen->qty_jual }}</td>
                                                        <td>{{ $pen->harga_jual }}</td>
                                                        <?php $jumlah = $pen->qty_jual * $pen->harga_jual;
                                                        echo "<td>$jumlah</td>";
                                                        ?>
                                                        <td>
                                                            {{ Form::open(['method' => 'DELETE', 'route' => ['transaksi.destroy', $pen->id_transaksi]]) }}
                                                                {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger', 'onsubmit' => 'return ConfirmDelete()']) }}
                                                            {{ Form::close() }}
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

            <div class="row">
                <div class="col-sm-12">
                   <div class="panel panel-border panel-custom">
                        <div class="panel-body">
                            {{--  <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('diskon_persen') ? ' has-error' : '' }}">
                                {!! Form::label('diskon_persen', 'Diskon Persen', ['class'=>'col-md-6 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::number('diskon_persen', null, ['class'=>'form-control','min' => '0', 'max' => '10']) !!}
                                        {!! $errors->first('diskon_persen', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('diskon_rupiah') ? ' has-error' : '' }}">
                                {!! Form::label('diskon_rupiah', 'Diskon Rupiah', ['class'=>'col-md-6 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::number('diskon_rupiah', null, ['class'=>'form-control','min' => '0', 'max' => '10000']) !!}
                                        {!! $errors->first('diskon_rupiah', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>  --}}

                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('harga_jual') ? ' has-error' : '' }}">
                                {!! Form::label('harga_jual', 'Harga Jual', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::number('harga_jual', $barang[0]->harga, ['class'=>'form-control',
                                        'id' => 'harga_jual','name' => 'harga_jual', 'readonly' => '', 'onkeyup' => 'sum();']) !!}
                                        {!! $errors->first('harga_jual', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
                                {!! Form::label('qty', 'Jumlah Beli', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::number('qty', null, ['class'=>'form-control', 'min' => '1',
                                        'max' => '100', 'name' => 'qty', 'id'=>'qty', 'autofocus' => '' ,'onkeyup' => 'sum();']) !!}
                                        {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Total Harga
                                    </label>
                                    <div class="col-md-4">
                                        <div class="pull-left">
                                            {!! Form::number('total', null, ['class'=>'form-control', 
                                            'id' => 'total', 'readonly' => '']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                   </div>
                </div>
            </div>
            {!! Form::close() !!}
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

<script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script src="assets/plugins/switchery/js/switchery.min.js"></script>
<script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

<script type="text/javascript" src="assets/plugins/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="assets/plugins/autocomplete/countries.js"></script>
<script type="text/javascript" src="assets/pages/autocomplete.js"></script>


<script src="assets/pages/datatables.init.js"></script>
<script type="text/javascript" src="assets/pages/jquery.form-advanced.init.js"></script>
{{--  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>  --}}

<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<!-- Sweet-Alert  -->
<script src="{{ asset('assets/plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.sweet-alert.init.js') }}"></script>

<script>

function initDataTable() {
  $("#tbl-order").DataTable();
}

function sum() {
    var txtFirstNumberValue = document.getElementById('harga_jual').value;
    var txtSecondNumberValue = document.getElementById('qty').value;
    var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
    if (!isNaN(result)) {
        document.getElementById('total').value = result;
    }
}

function kembalian() {
    var txtFirstNumberValue = document.getElementById('total_harga').value;
    var txtSecondNumberValue = document.getElementById('jumlah_uang').value;
    var result = parseInt(txtSecondNumberValue) - parseInt(txtFirstNumberValue);
    if (!isNaN(result)) {
        document.getElementById('kembalian').value = result;
    }
}
</script>
@endsection