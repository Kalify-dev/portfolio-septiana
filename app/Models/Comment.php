<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'article_id',
        'nama',
        'email',
        'isi_komentar',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
