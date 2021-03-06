<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Rak;
use App\Satuan;
use DB;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = DB::table('kategoris')
                    ->get();

        $rak = DB::table('raks')
        ->get();
            //return $barang;
            //print_r $barang;
        return view ('inventory.index', compact('kategori','rak'));
    }

    public function Hapus($id)
    {
        return 'OK';
    }

    public function SimpanKategori(Request $request)
    {
        //dd($request->all());
        $kategori = new Kategori();
        $input = $request->input();
        //return $input;
        $kategori->fill($input)->save();
        
        return redirect()->back();
    }

    public function SimpanRak(Request $request)
    {
        //dd($request->all());
        $rak = new Rak();
        $input = $request->input();
        $rak->fill($input)->save();

        return redirect()->back();
    }

    public function SimpanSatuan(Request $request)
    {
        //dd($request->all());
        $satuan = new Satuan();
        $input = $request->input();
        $satuan->fill($input)->save();

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
