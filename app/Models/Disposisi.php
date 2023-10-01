<?php

namespace App\Models;

use App\Models\SuratMasuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisis';

    protected $fillable = [
        'penerima',
        'tenggat_waktu',
        'isi_disposisi',
        'sifat_status',
        'catatan',
        'surat_masuk_id',
    ];

    public function suratmasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }
}
