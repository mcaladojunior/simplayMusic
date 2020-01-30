<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'artist_name', 'twitter_handle',
    ];

    public function albums() 
    {
    	return $this->hasMany('App\Album');
    }
}
