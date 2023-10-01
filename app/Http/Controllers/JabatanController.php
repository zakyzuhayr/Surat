<?php

namespace App\Http\Controllers;

use App\DataTables\JabatanDataTable;
use App\Models\Jabatan;
use App\Models\LogHistory;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JabatanDataTable $table)
    {
        return $table->render('templates.datatable', [
            'title' => 'Jabatan',
            'buttons' => '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jabatanTambahModal"><i class="fas fa-plus mr-2"></i> Tambah Jabatan</button>'
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
        $jb = new Jabatan();
        $log = new LogHistory();

        $jb->name = $request->name;
        $jb->status = $request->status;

        $log->name = auth()->user()->name;
        $log->type = "Create";
        $log->desc = "Membuat Jabatan - $request->name";
        $log->user_id = auth()->user()->id;

        $jb->save();
        $log->save();
        
        return redirect()->back()->with('success', 'Jabatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $jabatan->name = $request->name;
        $jabatan->status = $request->status;
        
        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Update";
        $log->desc = "Update Jabatan - $request->name";
        $log->user_id = auth()->user()->id;
        $log->save();

        $jabatan->save();

        return redirect()->back()->with('success', 'Jabatan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        
        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Hapus";
        $log->desc = "Hapus Jabatan - $jabatan->name";
        $log->user_id = auth()->user()->id;
        $log->save();

        return redirect()->back()->with('success', 'Jabatan berhasil dihapus!');
    }

    public function getJabatan($id)
    {
        $data = Jabatan::where('id', $id)->first();
        return response()->json($data);
    }
}
