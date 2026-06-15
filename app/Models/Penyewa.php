<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    use HasFactory;

    protected $table = 'penyewa';

    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'tanggal_masuk',
        'kamar_id',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'penyewa_id');
    }
}
