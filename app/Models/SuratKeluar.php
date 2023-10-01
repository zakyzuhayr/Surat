<?php

namespace App\Models;

use App\Models\Divisi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $fillable = [
        'no_surat',
        'sifat_surat',
        'perihal',
        'tanggal_surat',
        'surat_kepada',
        'pembuat_surat',
        'status_surat',
        'lampiran',
        'divisi_id',
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
