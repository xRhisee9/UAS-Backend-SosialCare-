<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;

    protected $fillable = ['pengajuan_id', 'tanggal_distribusi', 'petugas_id']; // PASTIKAN 'pengajuan_id' ADA DI SINI

    protected $casts = [
        'tanggal_distribusi' => 'date',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}