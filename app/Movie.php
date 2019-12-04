<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Movie extends Model
{
    /**
     * With this we casn get all the genres of the movie
     */
    public function genres() {
        return $this->belongsToMany('App\Genre');
    }

    /**
     * With this we casn get all the actors of the movie
     */
    public function actors() {
        return $this->belongsToMany('App\Person', 'people_act_movies',
        'movie_id', 'person_id');
    }

    /**
     * With this we casn get all the directors of the movie
     */
    public function directors() {
        return $this->belongsToMany('App\Person', 'people_direct_movies',
        'movie_id', 'person_id');
    }

    
    //The attributes that are mass assignable.
    protected $fillable = [
        'title', 'year', 'duration', 'rating', 'cover', 'filepath', 'filename', 'external_url', 
    ];

    ///////////////////////////////////////////////////////////////////////////////////////////
    // SCRAPING ///////////////////////////////////////////////////////////////////////////////
    /**
     * Method that with a given name of a movie it gets
     * information about it
     * 
     * @param name
     * @return Array
     */
    public static function scraping($name){
        //Miramos el nombre para ver cambiar los espacios por "+"
        //que es como le gusta a google
        $urlGoogle = "https://www.google.es/search?q=".str_replace(" ", "+", $name)."+Filmaffinity";

        //Hacemos scrapping de la página con el url que hemos obtenido
        $html = file_get_html($urlGoogle);
        
        //Obtenemos un listado con los distintos resultados de google
        $ret = $html->find('div[class=ZINbbc xpd O9g5cc uUPGi]');
        
        //Los recorremos apra comprobar si son de filmafinit
        for($i = 0; $i < sizeof($ret); $i++){
            if(isset($ret[$i]->children[0]->children[0]->attr['href'])){
                $link = $ret[$i]->children[0]->children[0]->attr['href'];
                
                //Si nuestro link es una dirección
                if(strpos($link, "https://") && strpos($link, ".html")){
                    //Lo recortamos
                    $link = substr($link, strpos($link, "https"));
                    $link = substr($link, 0, strpos($link, ".html") + 5);
                    
                    if(strpos($link, "filmaffinity.com")){
                        $goodLink = $link;
                        break;
                    } 
                }
            }
        }
        
        //Aqui ya tenemos la página
        //ahora tenemos que hacerle scrapping a esta
        $pageHtml = file_get_html($goodLink);
        $result = Array();

        //Title
        $titulo = $pageHtml->find('h1[id=main-title]');
        $result['title'] = trim($titulo[0]->children[0]->nodes[0]->_[4]);

        $movieInfo = $pageHtml->find('dl[class=movie-info]');
        $children = $movieInfo[0]->children;
        for($i = 0; $i < 7; $i++){
            
            //Year
            if(trim($children[$i]->nodes[0]->_[4]) == "Año"){
                $result['year'] = trim($children[$i+1]->nodes[0]->_[4]);
            }
            
            //duration
            if(trim($children[$i]->nodes[0]->_[4]) == "Duración"){
                $result['duration'] = trim(substr($children[$i+1]->nodes[0]->_[4], 0, -4));
            }
        }

        //Rating
        $rating = $pageHtml->find('div[id=movie-rat-avg]');
        $result['rating'] = str_replace(",", ".", trim($rating[0]->nodes[0]->_[4]));

        //Cover
        $cover = $pageHtml->find('a[class=lightbox]');
        $result['cover'] = $cover[0]->children[0]->attr['src'];

        //externalUrl
        $result["external_url"] = $goodLink;

        return $result;
    }

}
