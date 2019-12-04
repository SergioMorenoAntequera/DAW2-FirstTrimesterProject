<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * With this we can get all the movies where the person acted
     */
    public function moviesActed() {
        return $this->belongsToMany('App\Movie', 'people_act_movies',
        'person_id', 'movie_id');
    }

    /**
     * With this we can get all the movies that the person directed
     */
    public function moviesDirected() {
        return $this->belongsToMany('App\Movie', 'people_direct_movies',
        'person_id', 'movie_id');
    }

    //The attributes that are mass assignable.
    protected $fillable = [
        'name', 'photo', 'external_url', 
    ];
}
    