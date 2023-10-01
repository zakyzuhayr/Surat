<?php

namespace App\Http\Controllers;

use App\Models\LogHistory;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\DataTables\SuratKeluarDataTable;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SuratKeluarDataTable $table)
    {
        return $table->render('templates.datatable', [
            'title' => 'Surat Keluar',
            'buttons' => '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suratKeluarTambahModal"><i class="fas fa-plus mr-2"></i> Tambah Surat Keluar</button>'
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
        $surat = new SuratKeluar();

        // dd($request->all());

        $surat->no_surat = $request->no_surat;
        $surat->sifat_surat = $request->sifat_surat;
        $surat->perihal = $request->perihal;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->surat_kepada = $request->surat_kepada;
        $surat->pembuat_surat = auth()->user()->name;
        $surat->status_surat = "Menunggu Verifikasi";
        $surat->divisi_id = $request->divisi_id;

        if($request->file('lampiran')) {
            $fileName = time() . "_" . $request->file('lampiran')->getClientOriginalName();
            $request->lampiran->move(public_path('surat/keluar'), $fileName);
            $surat->lampiran = $fileName;
        }

        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Create";
        $log->desc = "Menambah Surat Keluar " . $request->no_surat;
        $log->user_id = auth()->user()->id;
        $log->save();

        $surat->save();

        return redirect()->back()->with('success', 'Surat Keluar berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKeluar $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratKeluar $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $surat = SuratKeluar::where('id', $request->surat_keluar_id)->first();

        $surat->no_surat = $request->no_surat;
        $surat->sifat_surat = $request->sifat_surat;
        $surat->perihal = $request->perihal;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->surat_kepada = $request->surat_kepada;
        $surat->pembuat_surat = auth()->user()->name;
        $surat->divisi_id = $request->divisi_id;

        // $surat->status_surat = ;

        if($request->file('lampiran')) {
            $fileName = time() . "_" . $request->file('lampiran')->getClientOriginalName();
            $request->lampiran->move(public_path('surat/keluar'), $fileName);
            $surat->lampiran = $fileName;
        }

        if($request->file('lampiran')) {
            if(File::exists("surat/masuk/$surat->lampiran")) {
                File::delete("surat/masuk/$surat->lampiran");
            }
            $fileName = time() . "_" . $request->file('lampiran')->getClientOriginalName();
            $request->lampiran->move(public_path('surat/masuk'), $fileName);
    
            $surat->lampiran = $fileName;
        }

        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Update";
        $log->desc = "Mengedit Surat Keluar " . $request->no_surat;
        $log->user_id = auth()->user()->id;
        $log->save();

        $surat->save();

        return redirect()->back()->with('success', 'Surat Keluar berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = SuratKeluar::where('id', $id)->first();
        $surat->delete();
        return redirect()->back()->with('success', 'Surat Keluar berhasil dihapus!');
    }

    public function getSuratK($id)
    {
        $data = SuratKeluar::where('id', $id)->first();

        return response()->json($data);
    }
}
