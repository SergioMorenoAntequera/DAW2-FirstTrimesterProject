<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    
    public function moviesActed() {
        return $this->belongsToMany('App\Movie', 'people_act_movies',
        'person_id', 'movie_id');
    }

    public function moviesDirected() {
        return $this->belongsToMany('App\Movie', 'people_direct_movies',
        'person_id', 'movie_id');
    }

    //The attributes that are mass assignable.
    protected $fillable = [
        'name', 'photo', 'external_url', 
    ];
}
    