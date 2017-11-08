<?php

namespace App\Http\Controllers;

use Form;
use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use Validator;
use DB;
use App\Rak;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::table('barangs')
                    ->join('kategoris', 'kategoris.id_kategori','=','barangs.id_kategori')
                    ->get();
         //return $barang;
        //print_r $barang;
        return view ('produk.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get the last created order
        $lastOrder = Barang::orderBy('kode_barang', 'desc')->first();
    
        if ( ! $lastOrder )
            // We get here if there is no order at all
            // If there is no number set it to 0, which will be 1 at the end.
            $number = 0;
        else 
            $number = substr($lastOrder->kode_barang, 4);
    
        $kode_barang = 'BRG-' . sprintf('%04d', intval($number) + 1);
        $tampil = Form::getValueAttribute('kode_barang', $kode_barang);

        $kategori = DB::table('kategoris')->get();
        $rak = Rak::all(['id_rak', 'nama_rak']);
        $satuan = DB::table('satuans')->get();
        //return $rak;
        return view('produk.create', compact('tampil','kategori','rak','satuan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make( $request->all(), [
            'kode_barang' => 'required|unique:barangs',
            'nama_barang' => 'required|unique:barangs',
            'harga' => 'required',
            'id_kategori' => 'required',
            'id_rak' => 'required',
            'id_satuan' => 'required',
        ]);

        $barang = Barang::create($request->all());
        if ( $validation->fails() ) {
            // change below as required
            return \Redirect::back()->withInput()->withErrors( $validation->messages() );
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang, $id)
    {
        $barang = Barang::findOrFail($id);
        return view('produk.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $input = $request->input();

        $validation = Validator::make( $request->all(), [
            'kode_barang' => 'required|unique:barangs',
            'nama_barang' => 'required|unique:barangs',
            'harga' => 'required',
            'id_kategori' => 'required',
            'id_rak' => 'required',
            'id_satuan' => 'required',
        ]);

        // $barang = Barang::create($request->all());
        if ( $validation->fails() ) {
            // change below as required
            return \Redirect::back()->withInput()->withErrors( $validation->messages() );
        }
        // $barang->fill($input)->save();
        $barang->update($request->all());
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->route('produk.index');
    }
}
