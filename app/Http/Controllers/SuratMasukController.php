<?php

namespace App\Http\Controllers;

use App\Models\LogHistory;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\DataTables\SuratMasukDataTable;
use App\Models\Disposisi;
use App\Models\Divisi;
use Illuminate\Support\Facades\Gate;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SuratMasukDataTable $table)
    {
        $buttons = '';
        $status = 'accept';
        if(!Gate::check('is_kepalabidang')) {
            $buttons = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suratMasukTambahModal"><i class="fas fa-plus mr-2"></i> Tambah Surat Masuk</button>';
        }

        return $table->with('status', $status)->render('templates.datatable', [
            'title' => 'Surat Masuk',
            'buttons' => $buttons
        ]);
    }

    public function waitVerif(SuratMasukDataTable $table)
    {
        $buttons = '';
        if(!Gate::check('is_kepalabidang')) {
            $buttons = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suratMasukTambahModal"><i class="fas fa-plus mr-2"></i> Tambah Surat Masuk</button>';
        }

        return $table->with('status', 'wait')->render('templates.datatable', [
            'title' => 'Surat Masuk',
            'buttons' => $buttons
        ]);
    }

    public function waitCorrection(SuratMasukDataTable $table)
    {
        $buttons = '';
        if(!Gate::check('is_kepalabidang')) {
            $buttons = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suratMasukTambahModal"><i class="fas fa-plus mr-2"></i> Tambah Surat Masuk</button>';
        }

        return $table->with('status', 'correction')->render('templates.datatable', [
            'title' => 'Surat Masuk',
            'buttons' => $buttons
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
        $surat = new SuratMasuk();
        $divisi = Divisi::where('id', $request->divisi_id)->first();

        $surat->status_surat = $request->status_surat;
        $surat->sifat_surat = $request->sifat_surat;
        $surat->sumber_surat = $request->sumber_surat;
        $surat->no_surat = $request->no_surat . "-" . $divisi->kode;
        $surat->kode_surat = $request->kode_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->tanggal_surat_masuk = $request->tanggal_surat_masuk;
        $surat->perihal = $request->perihal;
        $surat->divisi_id = $divisi->id;

        if($request->file('file')) {
            $fileName = time() . "_" . $request->file('file')->getClientOriginalName();
            $request->file->move(public_path('surat/masuk'), $fileName);
            $surat->file = $fileName;
        }

        $surat->check_status = "Menunggu Verifikasi";

        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Create";
        $log->desc = "Menambah Surat Masuk dari $request->sumber_surat";
        $log->user_id = auth()->user()->id;
        $log->save();

        $surat->save();

        return redirect()->back()->with('success', 'Surat Masuk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratMasuk  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(SuratMasuk $surat)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratMasuk  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratMasuk $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratMasuk  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $surat = SuratMasuk::where('id', $request->id)->first();
        $divisi = Divisi::where('id', $request->divisi_id)->first();

        $surat->status_surat = $request->status_surat;
        $surat->sifat_surat = $request->sifat_surat;
        $surat->sumber_surat = $request->sumber_surat;
        $surat->no_surat = $request->no_surat . '-' . $divisi->kode;
        $surat->kode_surat = $request->kode_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->tanggal_surat_masuk = $request->tanggal_surat_masuk;
        $surat->perihal = $request->perihal;
        $surat->divisi_id = $divisi->id;

        if($request->file('file')) {
            if(File::exists("surat/masuk/$surat->file")) {
                File::delete("surat/masuk/$surat->file");
            }
            $fileName = time() . "_" . $request->file('file')->getClientOriginalName();
            $request->file->move(public_path('surat/masuk'), $fileName);
    
            $surat->file = $fileName;
        }

        $surat->check_status = "Menunggu Verifikasi";
        if($request->tindakan != null) {
            $surat->check_status = $request->tindakan;
            $surat->catatan = $request->catatan;
        }

        // dd($request->all());
        // dd($surat);

        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Update";
        $log->desc = "Mengedit Surat Masuk dari $request->sumber_surat";
        $log->user_id = auth()->user()->id;
        $log->save();

        $surat->save();

        return redirect()->back()->with('success', 'Surat Masuk berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratMasuk  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SuratMasuk $surat_masuk)
    {
        $surat_masuk->delete();

        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Delete";
        $log->desc = "Menghapus Surat Masuk dari $request->sumber_surat";
        $log->user_id = auth()->user()->id;
        $log->save();

        return redirect()->back()->with('success', 'Surat Masuk berhasil dihapus!');
    }

    public function getSuratM($id)
    {
        $data = SuratMasuk::where('id', $id)->first();

        return response()->json($data);
    }

    public function disposisi($id)
    {
        $surat = SuratMasuk::where('id', $id)->first();
        return view('disposisi.create', [
            'title' => 'Detail Surat Masuk',
            'surat' => $surat
        ]);
    }

    public function disposisiStore(Request $request, $id)
    {
        $disposisi = new Disposisi();

        $surat = SuratMasuk::where('id', $id)->first();

        $disposisi->penerima = $request->penerima;
        $disposisi->tenggat_waktu = $request->tenggat_waktu;
        $disposisi->isi_disposisi = $request->isi_disposisi;
        $disposisi->sifat_status = $request->sifat_status;
        $disposisi->catatan = $request->catatan;
        $disposisi->surat_masuk_id = $surat->id;

        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Create";
        $log->desc = "Menambah disposisi Surat Masuk dari $surat->sumber_surat";
        $log->user_id = auth()->user()->id;
        $log->save();

        $disposisi->save();

        return redirect()->back()->with('success', 'Disposisi berhasil ditambahkan!');
    }
    
    public function disposisiUpdate(Request $request, $id)
    {
        $disposisi = Disposisi::where('id', $request->disposisi_id)->first();

        $surat = SuratMasuk::where('id', $id)->first();
        
        $disposisi->penerima = $request->penerima;
        $disposisi->tenggat_waktu = $request->tenggat_waktu;
        $disposisi->isi_disposisi = $request->isi_disposisi;
        $disposisi->sifat_status = $request->sifat_status;
        $disposisi->catatan = $request->catatan;

        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Update";
        $log->desc = "Mengedit disposisi Surat Masuk dari $surat->sumber_surat";
        $log->user_id = auth()->user()->id;
        $log->save();

        $disposisi->save();

        return redirect()->back()->with('success', 'Disposisi berhasil diupdate!');
    }
    
    public function disposisiDestroy($id)
    {
        $disposisi = Disposisi::where('id', $id)->first();

        $surat = SuratMasuk::where('id', $disposisi->surat_masuk_id)->first();
        
        $log = new LogHistory();
        $log->name = auth()->user()->name;
        $log->type = "Delete";
        $log->desc = "Menghapus disposisi Surat Masuk dari $surat->sumber_surat";
        $log->user_id = auth()->user()->id;
        $log->save();
        
        $disposisi->delete();

        return redirect()->back()->with('success', 'Disposisi berhasil dihapus!');
    }
}
