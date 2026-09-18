<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alat';
    protected $fillable = [
        'kategori_id',
        'nama_alat',
        'stok',
        'status_kondisi',
        'deskripsi',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function detailPinjam()
    {
        return $this->hasMany(DetailPinjam::class, 'alat_id');
    }
}
