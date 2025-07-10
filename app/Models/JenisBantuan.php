<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBantuan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_bantuan', 'deskripsi'];

    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class);
    }
}