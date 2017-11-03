<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use App\Laporan;
use App\User;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlah_perusahaan = Perusahaan::count();
        $jumlah_user = User::count();
        $jumlah_laporan = Laporan::count();
        
        return view('dashboard.home', compact('jumlah_perusahaan','jumlah_user','jumlah_laporan','laporan'));
    }

    public function editMember($id = null)
    {
        $user = Auth::user()->id_perusahaan;
        // return $user;
        $perusahaan = DB::table('perusahaan')
        ->leftjoin('users', 'perusahaan.id_perusahaan', '=', 'users.id_perusahaan')
        ->select('perusahaan.*','users.*')
        ->where('perusahaan.id_perusahaan','=', $user)
        ->first();
        $laporan = Laporan::where('id_perusahaan','=', $user)->get();
        // return $laporan;
        return view('member.edit', compact('perusahaan','laporan'));
    }

    public function updateMember(Request $request)
    {
        // return $request->all();
        $user = Auth::user()->id_perusahaan;
        
        DB::table('perusahaan')
        ->where('id_perusahaan','=', $user)
        ->update([
          'nama_perusahaan' => $request->nama_perusahaan,
          'alamat_perusahaan' => $request->alamat_perusahaan,
          'no_tlp' => $request->no_tlp,
          'jenis_perusahaan' => $request->jenis_perusahaan
          ]
        );
        
        $foreign = Perusahaan::where('nama_perusahaan', '=', $request->nama_perusahaan)->get();
        // return $request->all();
        DB::table('users')
        ->where('name', '=', $foreign[0]->nama_perusahaan)
        ->update([
            'name' => $request->nama_perusahaan,
            'email' => $request->email,
            'password' => bcrypt($request->password)
          ]
        );

        return back();
    }

    public function uploadMember(Request $request) 
    {
        $validator = Validator::make($request->all(), [
                'id_perusahaan' => 'required',
                'nama_file' => 'required|mimes:application/zip|max:10000',
              ]);
        
        $namafile = request()->nama_file->getClientOriginalName();

        $id_laporan = $request->id_laporan;
        $id_perusahaan = $request->id_perusahaan;
        $nama_file = $request->nama_file;

        $imageName = time().'.'.request()->nama_file->getClientOriginalExtension();    

        request()->nama_file->move(public_path('berkas'), time() . '.' . $namafile);

        // $simpan = Laporan::find($id_perusahaan);
        $simpan = new Laporan();
        $simpan->id_perusahaan = $id_perusahaan;
        $simpan->nama_file = time() . '.' . $namafile;
        $simpan->save();

        return back();
    }

    public function destroy($id)
    {
        $nama = Laporan::where('id_laporan', '=', $id)->first();
        return $nama;
        Laporan::destroy($id);
        File::delete('berkas/' . $nama->nama_file);
        
        return redirect()->back();
    }
}