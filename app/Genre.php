<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * With this we can get all the movies of the gender
     */
    public function movies() {
        return $this->belongsToMany('App\Movie');
    }

    //The attributes that are mass assignable.
    protected $fillable = [
        'description', 'details',
    ];
}
