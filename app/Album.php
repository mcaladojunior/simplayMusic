<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'album_name', 'year'
    ];

    public function album() 
    {
    	return $this->belongsTo('App\Artist');
    }
}
