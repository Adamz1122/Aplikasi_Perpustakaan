<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas';

    protected $fillable = [
        'user_id',
        'nis',
        'jurusan',
        'kelas',
        'jenis_kelamin',
        'alamat',
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
