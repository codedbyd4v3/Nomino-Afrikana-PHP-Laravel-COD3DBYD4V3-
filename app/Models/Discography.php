<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discography extends Model
{
    use HasFactory;

    protected $table = 'discographies';

    protected $fillable = [
        'title',
        'category',
        'cover_image',
        'release_date',
        'description',
        'spotify_url',
        'youtube_url',
        'apple_music_url',
    ];
}
