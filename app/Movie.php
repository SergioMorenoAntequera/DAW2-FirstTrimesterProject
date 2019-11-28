<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    
    public function genres() {
        return $this->belongsToMany('App\Genre');
    }

    public function actors() {
        return $this->belongsToMany('App\Person', 'people_act_movies',
        'movie_id', 'person_id');
    }

    public function directors() {
        return $this->belongsToMany('App\Person', 'people_direct_movies',
        'movie_id', 'person_id');
    }

    
    //The attributes that are mass assignable.
    protected $fillable = [
        'title', 'year', 'duration', 'rating', 'cover', 'filepath', 'filename', 'external_url', 
    ];

}
