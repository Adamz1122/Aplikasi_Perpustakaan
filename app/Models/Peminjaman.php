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
        'id_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jumlah',
        'status',
        'denda'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class,'id_buku');
    }

    // TAMBAHKAN INI
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

