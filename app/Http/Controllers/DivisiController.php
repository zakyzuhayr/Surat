<?php

namespace App\Http\Controllers;

use App\DataTables\DivisiDataTable;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DivisiDataTable $table)
    {
        return $table->render('templates.datatable', [
            'title' => 'Divisi',
            'buttons' => '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#divisiTambahModal"><i class="fas fa-plus mr-2"></i> Tambah Divisi</button>'
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
        $divisi = new Divisi();

        $divisi->name = $request->name;
        $divisi->kode = $request->kode;
        $divisi->desc = $request->desc;
        $divisi->status = $request->status;

        $divisi->save();

        return redirect()->back()->with('success', 'Divisi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $divisi)
    {
        $divisi->name = $request->name;
        $divisi->kode = $request->kode;
        $divisi->desc = $request->desc;
        $divisi->status = $request->status;

        $divisi->save();

        return redirect()->back()->with('success', 'Divisi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return redirect()->back()->with('success', 'Divisi berhasil dihapus!');
    }

    public function getDivisi($id)
    {
        $data = Divisi::where('id', $id)->first();
        return response()->json($data);
    }
}
