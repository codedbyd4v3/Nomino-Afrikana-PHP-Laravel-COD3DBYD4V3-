<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'title',
        'event_type',
        'date',
        'location',
        'description',
        'image',
    ];

    //  Define the relationship with Gallery
    public function galleryItems()
    {
        return $this->hasMany(Gallery::class, 'event_id', 'id');
    }
}
