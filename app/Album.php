<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'album_name', 'year', 'artist_id', 'artist_name'
    ];

    public function artist() 
    {
    	return $this->belongsTo('App\Artist');
    }
}
