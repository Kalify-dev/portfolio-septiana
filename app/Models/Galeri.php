<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = ['judul_kegiatan', 'deskripsi_singkat', 'caption', 'foto', 'urutan'];

    protected $casts = [
        'foto' => 'array',
    ];
}
