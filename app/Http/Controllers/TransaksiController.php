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

        $barang = Barang::all();

        $lastOrder = Transaksi::orderBy('invoice', 'desc')->select('invoice')->first();
            if ( ! $lastOrder )
                $number = 0;
            else 
                $number = substr($lastOrder->invoice, 5);
        
            $invoice = 'INVO-' . sprintf('%04d', intval($number) + 1);
            $tampil = Form::getValueAttribute('invoice', $invoice);

            // return $invoice;

        $trx_pending = DB::table('transaksis')->where('status', 'pending')
                        ->orWhere('invoice', $lastOrder)->get();
        
        // $showTable = DB::table('transaksis')
        //                 ->join('transaksis_detail', function($join)
        //                 {
        //                     $join->on('transaksis.id_transaksi', '=', 'transaksis_detail.id_transaksi')
        //                         ->where('transaksis.status', '=', 'pending');
        //                 })->get();

        $showTable = DB::table('transaksis')
                    ->join('transaksis_detail', 'transaksis.id_transaksi', '=', 'transaksis_detail.id_transaksi')
                    ->join('barangs', 'barangs.id_barang', '=', 'transaksis_detail.id_barang')
                    // ->select('users.id', 'contacts.phone', 'orders.price')
                    ->get();
        // return $showTable;

        return view ('transaksi.penjualan', compact('barang', 'tampil', 'trx_pending', 'showTable'));
    }

    public function SimpanTransaksi(Request $request)
    {
        // dd($request->all());
        // $transaksi_pending = Transaksi::create($request->all());
        $trx_pending = new Transaksi();
        $trx_pending->invoice = $request->invoice;
        $trx_pending->id_pelanggan = '1';
        $trx_pending->id_type_bayar = $request->id_tipe_bayar;
        $trx_pending->id_karyawan = $request->id_karyawan;
        $trx_pending->status = 'pending';

        $trx_pending->save();

        $id = Transaksi::where('invoice', '=', $request->invoice)->get();
        // return $id;
        
        $detail_trx = new TransaksiDetail();
        $detail_trx->id_transaksi = $id[0]->id_transaksi;
        $detail_trx->id_barang = $request->id_barang;
        $detail_trx->qty_jual = $request->qty;
        $detail_trx->id_satuan = '2';
        $detail_trx->diskon_jual = '0';
        $detail_trx->harga_jual = $request->harga_jual;
        $detail_trx->save();

        // return $detail_trx;
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
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}

