<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = ['nomor', 'judul', 'penulis', 'sinopsis', 'tipe', 'deskripsi', 'cover'];
}
