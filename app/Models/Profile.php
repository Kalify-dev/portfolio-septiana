<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'headline', 'image', 'hero_image', 'bio_short', 'bio_long'];
}
