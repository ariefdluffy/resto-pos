<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use App\User;
use App\Laporan;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Telegram\Bot\Laravel\Facades\Telegram;
use Auth;

class PerusahaanController extends Controller
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
    
    public function index(Request $request)
    {
        // $perusahaan = Perusahaan::select(['id_perusahaan','nama_perusahaan','alamat_perusahaan','no_tlp',
        // 'jenis_perusahaan']);
        // return $perusahaan;
        $perusahaan = Perusahaan::all();
        // return $perusahaan;
        return view('perusahaan.index', compact('perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required|unique:perusahaan',
            'email' => 'required|email',
          ]);
    
          if ($validator->fails())
          {
            $this->throwValidationException($request, $validator);
          }
    
          $perusahaan = new Perusahaan();
          $perusahaan->nama_perusahaan = $request->nama_perusahaan;
          $perusahaan->alamat_perusahaan = $request->alamat_perusahaan;
          $perusahaan->no_tlp = $request->no_tlp;
          $perusahaan->jenis_perusahaan = $request->jenis_perusahaan;
          $perusahaan->save();
  
          $id = Perusahaan::where('nama_perusahaan', '=', $request->nama_perusahaan)->get();
          
          $user = new User();
          $user->name = $request->nama_perusahaan;
          $user->email = $request->email;
          $user->password = bcrypt($request->password);
          $user->level = 'member';
          $user->id_perusahaan = $id[0]->id_perusahaan;
          $user->save();

        //   Session::get('email');

          return redirect()->route('perusahaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporan = Laporan::where('id_perusahaan','=', $id)->get();
        $perusahaan = Perusahaan::find($id);
        $user = User::where('id_perusahaan', '=', $id)->get();
        // return $laporan;
        return view('perusahaan.show', compact('perusahaan', 'user', 'laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perusahaan = Perusahaan::find($id);
        $user = User::where('id_perusahaan', '=', $id)->get();
        // return $user;
        return view('perusahaan.edit', compact('perusahaan','user'));
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
        
        $perusahaan = Perusahaan::find($id);
        $request->merge(['password' => Hash::make($request->password)]);
        $input = $request->input();
        $perusahaan->fill($input)->save();
        
        $user = User::find($id);
        // $user = User::where('id_perusahaan', '=', $id)->get();
        // return $request->all();
        // $user->fill($input)->save();
        $user->fill([
            'nama_perusahaan' => $request->name,
            'email' => $request->email,
            'password' => $request->password
         ]);
        
        Telegram::sendMessage([
          'chat_id' => '111519789',
          'text' => 'Data => '. $perusahaan->nama_perusahaan . ' telah DI-UPDATE'
        ]);
  
        return redirect()->route('perusahaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Perusahaan::destroy($id);
        return redirect()->route('perusahaan.index')
            ->with('success','User deleted successfully');
    }

    public function uploadBerkas(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'id_perusahaan' => 'required',
                'nama_file' => 'required|mimes:application/zip|max:10000',
                ]);
        
        $namafile = request()->nama_file->getClientOriginalName();

        // $id_laporan = $request->id_laporan;
        $id_perusahaan = $request->id_perusahaan;
        $nama_file = $request->nama_file;

        $imageName = time().'.'.request()->nama_file->getClientOriginalExtension();    

        request()->nama_file->move(public_path('berkas'), time() . '.' . $namafile);

        $simpan = Laporan::find($id_perusahaan);
        $simpan = new Laporan();
        $simpan->id_perusahaan = $id_perusahaan;
        $simpan->nama_file = time() . '.' . $namafile;
        $simpan->save();

        // Session::flash("flash_notification", [
        //     "level"=>"success",
        //     "message"=>"Berhasil upload Data"
        //   ]);
        
        return redirect()->route('perusahaan.index');
    }

}
