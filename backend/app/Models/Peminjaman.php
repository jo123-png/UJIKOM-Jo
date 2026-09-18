<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $fillable = [
        'user_id',
        'tgl_pinjam',
        'tgl_kembali_plan',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detailPinjam()
    {
        return $this->hasMany(DetailPinjam::class, 'peminjaman_id');
    }

    // Tambahan relasi dengan huruf 's' di belakang agar sesuai dengan pemanggilan di controller/view
    public function detailPinjams()
    {
        return $this->hasMany(DetailPinjam::class, 'peminjaman_id');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'peminjaman_id');
    }
}