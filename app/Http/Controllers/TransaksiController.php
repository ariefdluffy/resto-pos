<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\TransaksiDetail;
use App\Barang;
use Form;
use DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $qty = Form::getValueAttribute('qty');
        // $harga = Form::getValueAttribute('harga_jual');
        // $sum = $qty * $harga;
        $lastOrder = Transaksi::orderBy('invoice', 'desc')
            ->where('status', '=','selesai')
            ->select('invoice')->first();
            // return $lastOrder;
            if ( ! $lastOrder )
                $number = 0;
            else 
                $number = substr($lastOrder->invoice, 5);


            $invoice = 'INVO-' . sprintf('%04d', intval($number) + 1);
            $tampil = Form::getValueAttribute('invoice', $invoice);

        $barang = Barang::all();

        $showTable = DB::table('transaksis')
                    ->join('transaksis_detail', 'transaksis.invoice', '=', 'transaksis_detail.invoice')
                    ->join('barangs', 'barangs.id_barang', '=', 'transaksis_detail.id_barang')
                    ->where('transaksis.invoice', '=', $tampil)
                    ->get();

        $total_bayar = DB::table('transaksis_detail')
                            ->join('transaksis','transaksis.invoice','=','transaksis_detail.invoice')
                            ->select('subtotal')
                            ->where('status','=', 'pending')
                            ->sum('subtotal');
        //return $total_bayar;
        //dd($showTable->all());

        return view ('transaksi.penjualan', compact('barang','tampil', 'showTable','total_bayar'));
    }

    public function SimpanTransaksi(Request $request)
    {
        $lastOrder = Transaksi::orderBy('invoice', 'desc')
                ->where('status', '=','pending')
                ->select('invoice')->first();
        
            if ( ! $lastOrder )
                $number = 0;
            else 
                $number = substr($lastOrder->invoice, 5);


            $invoice = 'INVO-' . sprintf('%04d', intval($number) + 1);
            $tampil = Form::getValueAttribute('invoice', $invoice);
        
        if ($lastOrder == false){
            //return 'baru';
            $trx_pending = new Transaksi();
            $trx_pending->invoice = $request->invoice;
            $trx_pending->id_pelanggan = '1';
            $trx_pending->diskon_persen = '0';
            $trx_pending->diskon_rupiah = '0';
            $trx_pending->diskon_belanja = '0';
            $trx_pending->jumlah_bayar = '0';
            $trx_pending->jumlah_uang = '0';
            $trx_pending->sisa = '0';
            $trx_pending->keterangan = 'ket';
            $trx_pending->id_type_bayar = $request->id_tipe_bayar;
            $trx_pending->id_karyawan = $request->id_karyawan;
            $trx_pending->status = 'pending';
            $trx_pending->save();

            //$id = Transaksi::where('invoice', '=', $request->invoice)->get();

            $detail_trx = new TransaksiDetail();
            $detail_trx->invoice = $tampil;
            $detail_trx->id_barang = $request->id_barang;
            $detail_trx->qty_jual = $request->qty;
            $detail_trx->id_satuan = '2';
            $detail_trx->diskon_jual = '0';
            $detail_trx->subtotal = $request->total;
            $detail_trx->harga_jual = $request->harga_jual;
            $detail_trx->save();
            
        }else{
            //return 'lama';
            //dd($request->all());
            //return $trx_pending;
            $detail_trx = new TransaksiDetail();
            $detail_trx->invoice = $request->invoice;
            $detail_trx->id_barang = $request->id_barang;
            $detail_trx->qty_jual = $request->qty;
            $detail_trx->id_satuan = '2';
            $detail_trx->diskon_jual = '0';
            $detail_trx->subtotal = $request->total;
            $detail_trx->harga_jual = $request->harga_jual;
            $detail_trx->save();
        }       
        // dd($request->all());
        return redirect()->back();
    }

    public function ProsesTransaksi(Request $request, $id)
    {
        $id_transaksi1 = DB::table('transaksis')
                        ->select('id_transaksi', 'invoice')
                        ->where('invoice','=', $request->invoice)->get();
        
        $transaksi = Transaksi::find($id_transaksi1[0]->id_transaksi);
        
        $input = $request->input();
        
        $transaksi->fill($input)->save();
        
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $qty = Form::getValueAttribute('qty');
        // $harga = Form::getValueAttribute('harga_jual');
        // $total_bayar = $qty * $harga;
        dd($request->all());
        // return $total_bayar;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //$id = TransaksiDetail::where('id_transaksi_detail', '=', $transaksi->id_transaksi_detail)->get();
        TransaksiDetail::destroy($id);
        return redirect()->route('transaksi.index');
    }
}

