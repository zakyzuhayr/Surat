<?php

namespace App\Http\Controllers;

use App\DataTables\DataPegawaiDataTable;
use App\Models\DataPegawai;
use App\Models\Jabatan;
use App\Models\LogHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DataPegawaiController extends Controller
{

    /**
     * Memblokir keitka bukan admin
    */
    public function __construct()
    {
        // if(Gate::check()) {
            
        // }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataPegawaiDataTable $table)
    {
        if(!Gate::check('is_admin')) {
            return redirect()->intended('/');
        }
        return $table->render('templates.datatable', [
            'title' => 'Data Pegawai',
            'buttons' => '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dataPegawaiTambahModal"><i class="fas fa-plus mr-2"></i> Tambah Data Pegawai</button>'
        ]);
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
        $user = new User();
        $jabatan = Jabatan::where('id', $request->jabatan)->first();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->roles = $request->roles;
        $user->nama_jabatan = $jabatan->name;
        $user->status = $request->status;
        $user->password = $request->password;
        $user->jabatan_id = $request->jabatan_id;

        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Create";
        $log->desc = "Membuat Data Pegawai - $request->name";
        $log->user_id = auth()->user()->id;
        $log->save();

        $user->save();

        return redirect()->back()->with('success', 'Data Pegawai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPegawai  $dataPegawai
     * @return \Illuminate\Http\Response
     */
    public function show(DataPegawai $dataPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPegawai  $dataPegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPegawai $dataPegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPegawai  $dataPegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        $jabatan = $user->jabatan_id;
        if($request->jabatan != null) {
            $jabatan = Jabatan::where('id', $request->jabatan)->first();
            $user->nama_jabatan = $jabatan->name;
            $user->jabatan_id = $jabatan->id;
        }
        
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->roles = $request->roles;
        $user->status = $request->status;
        $user->nama_jabatan = $user->nama_jabatan;
        $user->jabatan_id = $user->jabatan_id;

        $password = $user->password;
        if($request->password != null) {
            $password = bcrypt($request->password);
        }
        $user->password = $password;

        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Update";
        $log->desc = "Update Data Pegawai - $request->name";
        $log->user_id = auth()->user()->id;
        $log->save();

        $user->save();

        return redirect()->back()->with('success', 'Data Pegawai berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPegawai  $dataPegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::where('id', $id)->first();

        $data->delete();

        return redirect()->back()->with('success', 'Data Pegawai berhasil dihapus!');
    }

    public function getUser($id)
    {
        $data = User::where('id', $id)->first();
        return response()->json($data);
    }
}
