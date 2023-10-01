<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogHistory extends Model
{
    use HasFactory;
    
    protected $table = 'log_histories';

    protected $fillable = [
        'name',
        'type',
        'desc',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
