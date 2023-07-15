<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class SuratKeluarController extends Controller
{
    public function surat_keluar()
    {
        $surat_keluar = SuratKeluar::all();
        return view('Administrator.surat_keluar', compact('surat_keluar'));
    }
    public function surat_keluar_tambah(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'no_surat' => 'required',
            'tanggal_surat' => 'required',
            'perihal' => 'required',
            'asal_surat' => 'required',
            'file_surat' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('surat_keluar')->with('failed', 'Data gagal')->withInput();
        }

        if (Auth::user()) {
            $file_surat = $request->file('file_surat');
            $name_gen = hexdec(uniqid()) . '.' . $file_surat->getClientOriginalExtension();
            // $path = $file_surat->storeAs('file_pdf', $name_gen);
            $path = $file_surat->storeAs(
                'file_pdf_keluar',
                $name_gen
            );
            $surat = new SuratKeluar();
            $surat->no_surat = $request->no_surat;
            $surat->tanggal_surat = $request->tanggal_surat;
            $surat->perihal = $request->perihal;
            $surat->asal_surat = $request->asal_surat;
            $surat->file_surat = $path;
            $surat->save();
        }
        return redirect()->route('surat_keluar')->with('success', 'Data berhasil diinput');
    }

    public function view_surat_keluar_pdf($id)
    {
        $pdf_id = SuratKeluar::find($id);
        return response()->file($pdf_id->file_surat);
    }

    public function edit_surat_keluar_view($id)
    {
        $surat = SuratKeluar::find($id);
        return view('Administrator.edit_surat_keluar', compact('surat'));
    }
    public function edit_surat_keluar_post(Request $request)
    {
        $surat = SuratKeluar::find($request->id);

        if (Auth::user()) {
            if ($request->file('file_surat')) {
                Storage::delete($surat->file_surat);
                $file_surat = $request->file('file_surat');
                $name_gen = hexdec(uniqid()) . '.' . $file_surat->getClientOriginalExtension();
                $path = $file_surat->storeAs(
                    'file_pdf_keluar',
                    $name_gen
                );
                $surat->update([
                    'file_surat' => $path
                ]);
            } else {
                $surat->update([
                    'no_surat' => $request->no_surat,
                    'tanggal_surat' => $request->tanggal_surat,
                    'asal_surat' => $request->asal_surat,
                    'perihal' => $request->perihal,
                ]);
            }
            return redirect()->route('surat_keluar')->with('success', 'Data berhasil dirubah');
        }
    }

    public function surat_keluar_hapus($id)
    {
        if (Auth::user()) {
            $surat = SuratKeluar::find($id);
            Storage::delete($surat->file_surat);
            SuratKeluar::find($id)->delete();
        }
        return redirect()->route('surat_keluar')->with('success', 'Data Berhasil Dihapus');
    }

}
