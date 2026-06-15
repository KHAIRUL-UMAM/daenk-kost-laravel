<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';

    protected $fillable = [
        'nomor_kamar',
        'harga',
        'fasilitas',
        'status',
    ];

    public function penyewa()
    {
        return $this->hasOne(Penyewa::class, 'kamar_id');
    }
}
