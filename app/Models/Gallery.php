<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries'; 

    protected $fillable = [
        'image_url',
        'caption',
        'category',
        'event_id',
    ];

    //  Relationship with Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
