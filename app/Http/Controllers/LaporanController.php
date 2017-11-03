<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Perusahaan;
use File;
use DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $perusahaan = Perusahaan::all('nama_perusahaan','id_perusahaan');
        // return $perusahaan->all();
        return view('laporan.index', compact('perusahaan'));
    }

    public function laporan_terpilih(Request $request)
    {
        $id = $request->id_perusahaan;
        $laporan = Laporan::where('id_perusahaan', $id)->get();
        $perusahaan = Perusahaan::find($id);
        
        return view('laporan.laporan1', compact('laporan', 'perusahaan'));
    }

    public function laporan_all()
    {
        $perusahaan = DB::table('perusahaan')
            ->leftjoin('users', 'perusahaan.id_perusahaan', '=', 'users.id_perusahaan')
            ->get();

        // return $laporan->toJson();

        // $perusahaan = Perusahaan::all();
        
        
        return view('laporan.laporan2', compact('perusahaan'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nama = Laporan::where('id_laporan', '=', $id)->first();
        
        Laporan::destroy($id);
        File::delete('berkas/' . $nama->nama_file);
    
        return redirect()->back();
    }
}
