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

DB::table('transaksis')
            ->where('transaksis.id_transaksi', $transaksi)
            ->update([
                'status' => 'selesai',
                'jumlah_uang' => $request->jumlah_uang
                ]);

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