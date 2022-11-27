<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Channels extends Model
{
    protected $fillable = [
        'name',
        'title',
        'image',
    ];

    use HasFactory;

    public function event(){

        return $this->belongsToMany(Events::class, 'event_channel')->withPivot('events_id', 'channels_id')->latest();
       
    }

}
