<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Barryvdh\DomPDF\PDF;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class SuratController extends Controller
{
    public function surat_masuk()
    {
        $surat_masuk = SuratMasuk::all();

        return view('Administrator.surat_masuk', compact('surat_masuk'));
    }
    public function surat_masuk_tambah(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'no_surat' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_surat_terima' => 'required',
            'perihal' => 'required',
            'asal_surat' => 'required',
            'file_surat' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('surat_masuk')->with('failed', 'Data gagal');
        }

        if (Auth::user()) {
            $file_surat = $request->file('file_surat');
            $name_gen = hexdec(uniqid()) . '.' . $file_surat->getClientOriginalExtension();
            // $path = $file_surat->storeAs('file_pdf', $name_gen);
            $path = $file_surat->storeAs(
                'file_pdf',
                $name_gen
            );
            $surat = new SuratMasuk;
            $surat->no_surat = $request->no_surat;
            $surat->tanggal_surat = $request->tanggal_surat;
            $surat->tanggal_terima = $request->tanggal_surat_terima;
            $surat->perihal = $request->perihal;
            $surat->asal_surat = $request->asal_surat;
            $surat->file_surat = $path;
            $surat->save();
        }
        return redirect()->route('surat_masuk')->with('success', 'Data berhasil diinput');
    }

    public function view_surat($id)
    {
        $pdf_id = SuratMasuk::find($id);
        return response()->file($pdf_id->file_surat);

    }

    public function edit_surat_view($id){
        $surat = SuratMasuk::find($id);
        return view( 'Administrator.edit_surat_masuk', compact('surat'));
    }
    public function edit_surat_post(Request $request){
        $surat = SuratMasuk::find($request->id);
        if(Auth::user()){
            if($request->file('file_surat')){
                Storage::delete($surat->file_surat);
                $file_surat = $request->file('file_surat');
                $name_gen = hexdec(uniqid()) . '.' . $file_surat->getClientOriginalExtension();
                $path = $file_surat->storeAs(
                    'file_pdf',
                    $name_gen
                );
                $surat->update([
                    'file_surat' => $path
                ]);
            }else{
                $surat->update([
                    'no_surat' => $request->no_surat,
                    'tanggal_surat' => $request->tanggal_surat,
                    'tanggal_terima' => $request->tanggal_surat_terima,
                    'asal_surat' => $request->asal_surat,
                    'perihal' => $request->perihal,
                ]);
            }
            return redirect()->route('surat_masuk')->with('success', 'Data berhasil dirubah');
        }
    }

    public function hapus_surat($id){
        if(Auth::user()){
            $surat = SuratMasuk::find($id);
            Storage::delete($surat->file_surat);
            SuratMasuk::find($id)->delete();
        }
        return redirect()->route('surat_masuk')->with('success', 'Data Berhasil Dihapus');
    }


}
