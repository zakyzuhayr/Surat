<?php

namespace App\Models;

use App\Models\Divisi;
use App\Models\Disposisi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';

    protected $fillable = [
        'status_surat',
        'sifat_surat',
        'sumber_surat',
        'no_surat',
        'kode_surat',
        'tanggal_surat',
        'tanggal_surat_masuk',
        'perihal',
        'file',
        'check_status',
        'tindakan',
        'catatan',
        'divisi_id',
    ];

    public function disposisi()
    {
        return $this->hasMany(Disposisi::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
