<div class="form-group{{ $errors->has('kode_barang') ? ' has-error' : '' }}">
  {!! Form::label('kode_barang', 'Kode Produk', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::text('kode_barang', $tampil, ['class'=>'form-control', 'autofocus' =>'autofocus']) !!}
    {!! $errors->first('kode_barang', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
  {!! Form::label('nama_barang', 'Nama Produk', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::text('nama_barang', null, ['class'=>'form-control']) !!}
    {!! $errors->first('nama_barang', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
  {!! Form::label('harga', 'Harga Jual', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::text('harga', null, ['class'=>'form-control']) !!}
    {!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('id_kategori') ? ' has-error' : '' }}">
  {!! Form::label('id_kategori', 'Kategori Produk', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::text('id_kategori', null, ['class'=>'form-control']) !!}
    {!! $errors->first('id_kategori', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('id_rak') ? ' has-error' : '' }}">
  {!! Form::label('id_rak', 'Rak Produk', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::text('id_rak', null, ['class'=>'form-control']) !!}
    {!! $errors->first('id_rak', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('id_satuan') ? ' has-error' : '' }}">
  {!! Form::label('id_satuan', 'Satuan Produk', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::text('id_satuan', null, ['class'=>'form-control']) !!}
    {!! $errors->first('id_satuan', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
  {!! Form::label('qty', 'Total Barang', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::text('qty', null, ['class'=>'form-control']) !!}
    {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
  {!! Form::label('ket', 'Keterangan Barang', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::textarea('ket', null, ['class'=>'form-control', 'rows'=>'3']) !!}
    {!! $errors->first('ket', '<p class="help-block">:message</p>') !!}
  </div>
</div>

{{--  <div class="form-group{{ $errors->has('jenis_perusahaan') ? ' has-error' : '' }}">
  {!! Form::label('jenis_perusahaan', 'Jenis Perusahaan', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {{ Form::select('jenis_perusahaan', [
       'Perkayuan' => 'Perkayuan',
       'Perkebunan' => 'Perkebunan',
       'Pertambangan' => 'Pertambangan'], null,['class' => 'form-control']
    ) }}
    {!! $errors->first('jenis_perusahaan', '<p class="help-block">:message</p>') !!}
  </div>
</div>  --}}

<div class="form-group">
  <div class="col-md-6 col-md-offset-4">
    {{--  {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}  --}}
    <button type="submit" 
    href="javascript:;" 
    onclick="$.Notification.autoHideNotify('success', 'top right', 'Prosesing...','Data sedang diproses.')"
    class="btn btn-embossed btn-primary m-r-0"><i class="fa fa-floppy-o"></i> Simpan</button>
  </div>
</div>