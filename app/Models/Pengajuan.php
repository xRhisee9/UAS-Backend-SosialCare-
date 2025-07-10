<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = ['warga_id', 'jenis_bantuan_id', 'tanggal_pengajuan', 'status'];

    protected $casts = [
        'tanggal_pengajuan' => 'date',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function jenisBantuan()
    {
        return $this->belongsTo(JenisBantuan::class);
    }

    public function distribusi()
    {
        return $this->hasOne(Distribusi::class);
    }
}